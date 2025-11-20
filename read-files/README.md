# File Commands In PHP
* opendir('url): gets a folder at the specific path and then returns its streams
* readdir(opendir('url')): reads each stream of opendir() per call.
    * We ususaly use it with while loop like
        * ```while(($currFile = readdir($stream)))```
* file_exists(file) returns if the file exist or not
* is_file($fileOrDir) returns true if the stream is file or not;
* id_dir($fileOrDir) returns true if the stream is directory or not
* pathinfo(path, extact (optional)) returns a prediction array of properties about the path
* filesize(file) returns a float number which indicates the size of the file
* filemtime(file) returns the last time the file was modified as string