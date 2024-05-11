<?php


/**
 * image cropper and resizer
 */
class Image
{
	
	public function crop($src_image_path, $dest_image_path, $max_size = 600 )
	{
		// code...
		if (file_exists($src_image_path)) {
			$ext = strtolower(pathinfo($src_image_path, PATHINFO_EXTENSION));
			if ($ext == 'jpg' || $ext == 'jpeg') {
				// creating the image resource from jpeg
				$src_image = imagecreatefromjpeg($src_image_path);
			}elseif ($ext == 'png') {
				// creating the image resource from png
				$src_image = imagecreatefrompng($src_image_path);
			}elseif ($ext == 'gif') {
				$src_image = imagecreatefromgif($src_image_path);
			}else {
				$src_image = imagecreatefromjpeg($src_image_path);
			}

			if ($src_image) {

				$height = imagesy($src_image);
				$width = imagesx($src_image);

				// check which side is larger
				if ($width > $height) {
					$extra_space = $width - $height;
					$src_x = $extra_space / 2;
					$src_y = 0;

					$src_w = $height;
					$src_h = $height;
				}else {
					$extra_space = $height - $width;
					$src_y = $extra_space / 2;
					$src_x = 0;

					$src_w = $width;
					$src_h = $width;
				}

				$dst_image = imagecreatetruecolor($max_size, $max_size);
				imagecopyresampled($dst_image, $src_image, 0, 0, $src_x, $src_y, $max_size, $max_size, $src_w, $src_h);
				// to save to the destination path
				imagejpeg($dst_image, $dest_image_path);
			}
			
		}
		
	}

	public function profile_thumb($image_path)
	{
		$crop_size = 600;
		$ext = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
		$thumbnail = str_replace('.'.$ext, '_thumb.'.$ext, $image_path);
		if (!file_exists($thumbnail)) {
			$this->crop($image_path, $thumbnail, $crop_size);
		}

		return $thumbnail;
		
	}


} // End Class