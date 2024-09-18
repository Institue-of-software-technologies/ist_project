<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class skills extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages_and_frameworks = [
            // Programming Languages
            "Python",
            "JavaScript",
            "PHP",
            "Java",
            "C#",
            "Ruby",
            "Kotlin",
            "Swift",
            "C++",
            "Go",
            "Rust",
            "TypeScript",
            "Dart",
            "Scala",
            "Perl",
            "Objective-C",
            "Haskell",
            "Elixir",
            "C",
            "R",
            "Lua",
            "MATLAB",
            "F#",
            "Fortran",
            "VB.NET",
            "Shell",
            "Lisp",
            "Pascal",
            "Erlang",
            "VHDL",
            "Assembly",
            "COBOL",
            "Ada",
            "Prolog",
            "Julia",
            "Groovy",
            "Tcl",
            "Scheme",
            "Solidity",
            "Xamarin",
            "D",
            "Crystal",
            "Nim",
            "OCaml",
            "Forth",
            "Zig",
            "Smalltalk",
            "CoffeeScript",
            "Haxe",
            "Racket",
            "Mercury",
            "Vala",
            "PL/SQL",
            "ActionScript",
            "ColdFusion",
            "Icon",
            "Awk",
            "Bash",
            "VimL",
            "Powershell",
            "Io",
            "Eiffel",
            "Dylan",
            "Pike",
            "Simula",
            "Modula-2",
            "Ballerina",
            "Befunge",
            "Zeno",
            "Pony",
            "Agda",
            "Coq",
            "Verilog",
            
            // Frameworks
            "Django (Python)",
            "Flask (Python)",
            "React (JavaScript)",
            "Vue.js (JavaScript)",
            "Angular (JavaScript)",
            "Laravel (PHP)",
            "Symfony (PHP)",
            "Spring (Java)",
            "Hibernate (Java)",
            "ASP.NET (C#)",
            "Ruby on Rails (Ruby)",
            "Flutter (Dart)",
            "Express.js (JavaScript)",
            "NestJS (JavaScript)",
            "Next.js (JavaScript)",
            "Nuxt.js (JavaScript)",
            "Svelte (JavaScript)",
            "Meteor.js (JavaScript)",
            "FastAPI (Python)",
            "Bottle (Python)",
            "Play Framework (Scala/Java)",
            "Akka (Scala)",
            "Phoenix (Elixir)",
            "Ktor (Kotlin)",
            "Micronaut (Java)",
            "Grails (Groovy)",
            "Blade (Java)",
            "Gin (Go)",
            "Echo (Go)",
            "Rocket (Rust)",
            "Actix (Rust)",
            "Quarkus (Java)",
            "Gatsby.js (JavaScript)",
            "Gridsome (JavaScript)",
            "ASP.NET Core (C#)",
            "Ionic (JavaScript)",
            "Bootstrap (JavaScript/CSS)",
            "Tailwind CSS",
            "Ant Design (JavaScript)",
            "Bulma (CSS)",
            "Materialize (CSS)",
            "Foundation (CSS)",
            "Chakra UI (JavaScript)",
            "PrimeNG (Angular)",
            "PrimeReact (React)",
            "Vuetify (Vue.js)",
            "Electron (JavaScript)",
            "Capacitor (JavaScript)",
            "Cordova (JavaScript)",
            "Jest (JavaScript)",
            "Mocha (JavaScript)",
            "PyTest (Python)",
            "JUnit (Java)",
            "RSpec (Ruby)"
        ];
        
        foreach ($languages_and_frameworks as $item) {
            DB::table('skills')->insert([
                'name' => $item,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
    }
}
