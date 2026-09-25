<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        Skill::truncate();

        $skills = [
            // ===== CORE TECHNOLOGIES =====
            ['name' => 'Git', 'category' => 'Core Technologies', 'subtitle' => 'Version Control',
             'percentage' => 90, 'description' => 'Repository Management, Branching, Merging, GitHub/GitLab', 'order' => 1],
            ['name' => 'Python', 'category' => 'Core Technologies', 'subtitle' => 'Scripting & Automation',
             'percentage' => 85, 'description' => 'Data Analysis, Task Automation, Basic Web Development', 'order' => 2],

            // ===== FRAMEWORKS & LIBRARIES =====
            ['name' => 'Laravel', 'category' => 'Frameworks & Libraries', 'subtitle' => 'PHP Web Framework',
             'percentage' => 80, 'description' => 'MVC Architecture, Eloquent ORM, Routing, Security', 'order' => 3],
            ['name' => 'React.js', 'category' => 'Frameworks & Libraries', 'subtitle' => 'JavaScript Library',
             'percentage' => 75, 'description' => 'Component-based, State Management, UI Design', 'order' => 4],
            ['name' => 'Unity', 'category' => 'Frameworks & Libraries', 'subtitle' => 'Game & Simulation Dev',
             'percentage' => 60, 'description' => 'C# Scripting, 3D Asset Management, Basic Physics', 'order' => 5],

            // ===== DATABASE & IT SERVICES =====
            ['name' => 'MySQL', 'category' => 'Database & IT Services', 'subtitle' => 'Relational Database',
             'percentage' => 70, 'description' => 'SQL Queries, Database Design, Optimization', 'order' => 6],
            ['name' => 'IT Maintenance', 'category' => 'Database & IT Services', 'subtitle' => 'Hardware & Software Support',
             'percentage' => 85, 'description' => 'Diagnostics, PC Repair, Troubleshooting, OS Installation', 'order' => 7],
            ['name' => 'Microsoft Office', 'category' => 'Database & IT Services', 'subtitle' => 'Productivity Suite',
             'percentage' => 90, 'description' => 'Excel Advanced Formulas, Word Documents, PowerPoint Presentations', 'order' => 8],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}