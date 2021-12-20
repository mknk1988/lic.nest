<?php

namespace App\Console\Commands;

use App\Models\Licenses;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class SyncLicenses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:licenses';

    protected string $serverUrl = "";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync licenses from server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info($this->description . " " . $this->getDate());
        $countInsert = $this->syncLicenses();
        $this->info("Insert " . $countInsert . " items " . $this->getDate());
        return 0;
    }

    protected function syncLicenses(): int
    {
        $items = $this->getData();

        if (count($items["licenses"]) > 0) {
            $this->truncate();
            $this->info("Delete all data from licenses " . $this->getDate());
        } else {
            $this->info("No data from server " . $this->getDate());
        }

        $countInsertData = 0;

        foreach ($items["licenses"] as $license) {
            $license["ogrn"] = intval($license["ogrn"]);
            $license["inn"] = intval($license["inn"]);
            $license["activity_addresses"] = implode(", ", $license["activity_addresses"]);
            $license["work_types"] = implode(", ", $license["work_types"]);
            $license["work_types"] = str_replace("\n", " ", str_replace("\r\n", " ", $license["work_types"]));
            $date = new \DateTime($license["date_issue"]);
            $license["date_issue"] = $date->format("Y-m-d");
            $date = new \DateTime($license["date_order"]);
            $license["date_order"] = $date->format("Y-m-d");

            $this->store($license);
            $countInsertData++;
        }

        $shedule = new Schedule();
        $shedule->exec("cache:clear");

        return $countInsertData;
    }

    protected function getData(): array
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->serverUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }

    protected function truncate(): bool
    {
        Licenses::truncate();
        return true;
    }

    protected function store(array $item)
    {
        $license = new Licenses();

        $license->organization = $item["organization"];
        $license->ogrn = $item["ogrn"];
        $license->inn = $item["inn"];
        $license->license_number = $item["license_number"];
        $license->date_issue = $item["date_issue"];
        $license->date_order = $item["date_order"];
        $license->order_content = $item["order_content"];
        $license->location_address = $item["location_address"];
        $license->activity_addresses = $item["activity_addresses"];
        $license->work_types = $item["work_types"];

        $license->save();
    }

    protected function getDate()
    {
        return date("Y-m-d H:i:s", time());
    }
}
