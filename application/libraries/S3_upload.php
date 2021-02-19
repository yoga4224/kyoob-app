<?php

/**
 * Amazon S3 Upload PHP class
 *
 * @version 0.1
 */
use Aws\S3\MultipartUploader;
use Aws\Exception\MultipartUploadException;

class S3_upload {

	private $s3;

	function __construct()
	{
		$this->CI =& get_instance();

		$this->CI->config->load('s3', TRUE);
		$s3_config = $this->CI->config->item('s3');
		$this->bucket_name = $s3_config['bucket_name'];

		$this->s3 = new Aws\S3\S3Client([

            'region'  => $s3_config['region'],
            'version' => $s3_config['version'],
            'credentials' => [
                'key'    => $s3_config['access_key'],
                'secret' => $s3_config['secret_key'],
            ]

		]);
	}

	function upload_file($file_path, $folder_path)
	{
		// generate unique filename
		$file = pathinfo($file_path);
		$s3_file = $file['filename'].'-'.uniqid().'.'.$file['extension'];
		$mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file_path);
		$upload_path = fopen($file_path, 'rb');

		$uploader = new MultipartUploader($this->s3, $upload_path , [
			'bucket' => $this->bucket_name,
			'key'    => $folder_path.$s3_file,
			'ACL' => 'public-read',
			'before_initiate' => function (\Aws\Command $command) use ($mime_type) {
			// $command is a CreateMultipartUpload operation
			$command['ContentDisposition'] = 'attachment';
			$command['CacheControl'] = 'max-age=3600';
			$command['ContentType'] = $mime_type;
			},
			'before_upload' => function (\Aws\Command $command) {
			   // $command is an UploadPart operation
			   $command['RequestPayer'] = 'requester';
			},
			'before_complete' => function (\Aws\Command $command) {
			   // $command is a CompleteMultipartUpload operation
			   $command['RequestPayer'] = 'requester';
			},
		]);
	
		do {
			try {
				$result = $uploader->upload();
	
				$data['success'] = 'true';
				$data['name'] = $s3_file;
				$data['url'] = $result['ObjectURL'];

				

			} catch (MultipartUploadException $e) {
				// rewind($uploadedFile->file);
				$uploader = new MultipartUploader($this->s3, $upload_path, [
					'state' => $e->getState(),
				]);
	
				$data['success'] = 'false';
			}
		} while (!isset($result));

		fclose($upload_path);
		gc_collect_cycles();
		unlink($file_path); 
	
		return $data;
	}
}