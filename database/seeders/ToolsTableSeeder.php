<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ToolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tools = [
            "Nmap",
            "Metasploit",
            "Wireshark",
            "Burp Suite",
            "Aircrack-ng",
            "John the Ripper",
            "Hydra",
            "SQLmap",
            "Nikto",
            "Gobuster",
            "Maltego",
            "Ettercap",
            "Reaver",
            "Social Engineer Toolkit (SET)",
            "Kismet",
            "OpenVAS",
            "Armitage",
            "BeEF",
            "Cuckoo Sandbox",
            "DirBuster",
            "Fuzzbunch",
            "Netcat",
            "ZAP",
            "Evil-WinRM",
            "Impacket",
            "JexBoss",
            "Kali Linux Tools",
            "Mimikatz",
            "MISP",
            "Osmedeus",
            "Responder",
            "TheHarvester",
            "Volatility",
            "Wifite",
            "Yersinia",
            "Nessus",
            "Burp Suite Community",
            "Acunetix",
            "Burp Suite Pro",
            "Maltego CE",
            "OWASP Dependency-Check",
            "Faraday",
            "AlienVault OSSIM",
            "Snyk",
            "Radare2",
            "Goby",
            "RIPS",
            "SonarQube",
            "Pylint",
            "PHP_CodeSniffer",
            "Wapiti",
            "RsaCtfTool",
            "XSSer",
            "Fierce",
            "Recon-ng",
            "SQLNinja",
            "BruteSpray",
            "Red Hock",
            "Wifiphisher",
            "Bludit",
            "CeWL",
            "DMitry",
            "Hashcat",
            "InSpy",
            "Powersploit",
            "WebScarab"
        ];

        foreach ($tools as $tool) {
            DB::table('tools')->insert([
                'tool_name' => $tool,
                'created_at' => now(), 
                'updated_at' => now()
            ]);
        }
    }
}
