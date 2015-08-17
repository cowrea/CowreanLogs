Common Issues:

"The function imageantialias() is not available in your PHP installation. Use the GD version that comes with PHP and not the standalone version.”

You have to comment out "JpGraphError::RaiseL(25128)" in function "SetAntiAliasing" in file ".../jpgraph/src/gd_image.inc.php".
