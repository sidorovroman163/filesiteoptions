<?php namespace SidorovRoman\FileSiteOptions;

use App;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class Repository
{
    /**
     * Путь к файлу сохранения
     *
     * @var string
     */
    protected $file_path;
    protected $tmp_path;

    /**
     * @return void
     */
    public function __construct()
    {
        $path         = $this->file_path = storage_path('/app/sidorovroman/fileSiteOptions.json');
        $storage_path = '/sidorovroman/fileSiteOptions.json';
        $tmp_path     = $this->tmp_path = base_path('/vendor/sidorovroman/filesiteoptions/fileSiteOptions.json');

        $isExists = Storage::exists($storage_path);

        if (!$isExists) {
            $json = file_get_contents($tmp_path);
            Storage::put($storage_path, $json);
        }
    }

    /**
     * @param $key string
     *
     * @return void
     * @throws \Exception
     */
    public function set($key, $value)
    {
        try {
            $json  = file_get_contents($this->file_path);
            $array = json_decode($json, true);

            Arr::set($array, $key, $value);

            file_put_contents($this->file_path, json_encode($array));
            file_put_contents($this->tmp_path, json_encode($array));
        } catch (\Exception $ex) {
            throw new \Exception('Проверьте наличие файла \fileSiteOptions.json!');
        }
    }

    /**
     * @param $key string
     *
     * @return string
     * @throws \Exception
     */
    public function get($key)
    {
        try {
            $json  = file_get_contents($this->file_path);
            $array = json_decode($json, true);

            return Arr::get($array, $key);
        } catch (\Exception $ex) {
            throw new \Exception('Проверьте наличие файла \fileSiteOptions.json!');
        }
    }

    /**
     * @param $key string
     *
     * @return void
     * @throws \Exception
     */
    public function dell($key)
    {
        try {
            $json  = file_get_contents($this->file_path);
            $array = json_decode($json, true);

            Arr::forget($array, $key);

            file_put_contents($this->file_path, json_encode($array));
            file_put_contents($this->tmp_path, json_encode($array));
        } catch (\Exception $ex) {
            throw new \Exception('Проверьте наличие файла \fileSiteOptions.json!');
        }
    }
}