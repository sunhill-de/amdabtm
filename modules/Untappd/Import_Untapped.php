<?php

namespace Modules\Untappd;

use Illuminate\Support\Facades\DB;

class Import_Untapped 
{
    
    protected $company_type;
    
    protected $data_source;
    
    private function readCVS(string $file): array
    {
        $rows = array_map('str_getcsv', file($file));
        $header = array_shift($rows);
        $csv = array();
        foreach ($rows as $row) {
            $csv[] = array_combine($header, $row);
        }        
    }
    
    private function getCompanyType(string $type): int
    {
        if (!is_null($this->company_type)) {
            return $this->company_type;
        }
        $data = DB::table('company_types')->select('id')->where('name','brewery')->first();
        return $data['id'];
    }
    
    private function getDataSource(): int
    {
        if (!is_null($this->data_source)) {
            return $this->date_source;
        }
        $data = DB::table('data_sources')->select('id')->where('name','untappd')->first();
        return $data['id'];        
    }
    
    private function getOrAddCountry(string $country): int
    {
        if ($data = DB::table('country')->select('id')->where('name',$country)->first()) {
            return $data['id'];
        }
        return DB::table('countries')->insertGetId(
            [
                'name'=>$country,
                'data_source'=>$this->getDataSource()                
            ]);
    }

    private function getOrAddRegion(string $region, string $country): int
    {
        $country_id = $this->getOrAddCountry($country);
        if ($data = DB::table('regions')->select('id')->where('name',$country)->where('country',$country_id)->first()) {
            return $data['id'];
        }
        return DB::table('countries')->insertGetId(
            [
                'name'=>$region,
                'country'=>$country_id,
                'data_source'=>$this->getDataSource()                
            ]);        
    }
    
    private function getOrAddBeerType(string $type): int
    {
        if ($data = DB::table('beer_type')->select('id')->where('name',$type)->first()) {
            return $data['id'];
        }
        return DB::table('countries')->insertGetId(['name'=>$type]);        
    }
    
    private function getOrAddBrewery($name, $country, $city, $state)
    {
        
    }
    
    private function importBeer(array $beer)
    {
        $beer_type_info = ['name'=>$beer['beer_type']];
        $brewery_info = [
            'name'=>$beer['brewery_name'],
            'type'=>$this->getCompanyType('brewery'),
        ];
        $beer_info = [
            'name'=>$beer['beer_name']
        ];    
    }
    
    public function import(string $file)
    {
        $data = $this->readCVS($file);
        foreach ($data as $beer) {
            $this->importBeer($beer);
        }
    }
    
}