<?php 

error_reporting(E_ALL);

$token = "y0_AgAAAAAhn26rAAhdWgAAAADNriW2N0YTV2I_T_acs2NM0NTEKZBjFyg";

class diskHandler
{
    protected $disk;

    public function __construct($token)
    {
        $disk = new Arhitector\Yandex\Disk();
        $this->disk = $disk->setAccessToken($token);
    }

    public function getAll()
    {
        $collection = $this->disk->getResources('999', '0');
        $collection->toObject();
        $collection->getIterator();
        return $collection;
    }

    public function fileDelete($filePath)
    {
        $resource = $this->disk->getResource($filePath, 0);
        $resource->delete();
    }

    public function fileDownload($filePath)
    {
        $resource = $this->disk->getResource($filePath, 0);
        $resource->download('../downloads/' . $resource['name'], true);
    }

    public function fileUpload($file)
    {
        try {
            $resource = $this->disk->getResource($file['name'], 0);
            $resource->toArray();
        } catch (Arhitector\Yandex\Client\Exception\NotFoundException $exc) {
            $resource->upload($file['tmp_name']);
        }
    }
}

?>