<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Zidane Abbas M',
            'email' => 'admin@zidane.com',
            'password' => bcrypt('passwordkamu'),
        ]);
        // ─── Projects ────────────────────────────────────────────────────────
        // $projects =
        //  [
        //     [
        //         'title'       => 'ShopFlow - E-Commerce Platform',
        //         'description' => 'Modern e-commerce platform with advanced features including real-time inventory management, secure payment processing, and comprehensive admin dashboard. Built with microservices architecture for scalability.',
        //         'thumbnail'   => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=600&h=400&fit=crop&auto=format',
        //         'images'      => [],
        //         'tech_stack'  => ['React', 'Node.js', 'MongoDB', 'Stripe', 'Redis'],
        //         'category'    => 'web',
        //         'github_url'  => 'https://github.com/yourusername/shopflow',
        //         'demo_url'    => 'https://shopflow-demo.vercel.app',
        //         'status'      => 'completed',
        //         'featured'    => true,
        //         'sort_order'  => 1,
        //     ],
        //     [
        //         'title'       => 'TaskMaster Pro',
        //         'description' => 'Collaborative project management tool with real-time updates, drag-and-drop kanban boards, team chat, and advanced reporting. Perfect for agile development teams.',
        //         'thumbnail'   => 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=600&h=400&fit=crop&auto=format',
        //         'images'      => [],
        //         'tech_stack'  => ['Vue.js', 'Socket.io', 'PostgreSQL', 'Express'],
        //         'category'    => 'web',
        //         'github_url'  => 'https://github.com/yourusername/taskmaster-pro',
        //         'demo_url'    => 'https://taskmaster-pro.netlify.app',
        //         'status'      => 'completed',
        //         'featured'    => true,
        //         'sort_order'  => 2,
        //     ],
        //     [
        //         'title'       => 'SocialMetrics Analytics',
        //         'description' => 'Advanced social media analytics platform using machine learning for sentiment analysis, engagement prediction, and automated reporting.',
        //         'thumbnail'   => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop&auto=format',
        //         'images'      => [],
        //         'tech_stack'  => ['Python', 'Django', 'TensorFlow', 'Pandas', 'PostgreSQL'],
        //         'category'    => 'data',
        //         'github_url'  => 'https://github.com/yourusername/socialmetrics',
        //         'demo_url'    => 'https://socialmetrics-demo.herokuapp.com',
        //         'status'      => 'completed',
        //         'featured'    => true,
        //         'sort_order'  => 3,
        //     ],
        //     [
        //         'title'       => 'WeatherScope Dashboard',
        //         'description' => 'Comprehensive weather analytics platform with interactive maps, historical data visualization, and AI-powered weather predictions.',
        //         'thumbnail'   => 'https://images.unsplash.com/photo-1504608524841-42fe6f032b4b?w=600&h=400&fit=crop&auto=format',
        //         'images'      => [],
        //         'tech_stack'  => ['React', 'D3.js', 'OpenWeather API', 'Chart.js'],
        //         'category'    => 'web',
        //         'github_url'  => 'https://github.com/yourusername/weatherscope',
        //         'demo_url'    => 'https://weatherscope-dashboard.vercel.app',
        //         'status'      => 'completed',
        //         'featured'    => false,
        //         'sort_order'  => 4,
        //     ],
        //     [
        //         'title'       => 'CryptoTracker Analytics',
        //         'description' => 'Real-time cryptocurrency tracking and analysis platform with portfolio management, price alerts, and market sentiment analysis using machine learning.',
        //         'thumbnail'   => 'https://images.unsplash.com/photo-1518546305927-5a555bb7020d?w=600&h=400&fit=crop&auto=format',
        //         'images'      => [],
        //         'tech_stack'  => ['Python', 'FastAPI', 'Pandas', 'Plotly', 'Redis'],
        //         'category'    => 'data',
        //         'github_url'  => 'https://github.com/yourusername/cryptotracker',
        //         'demo_url'    => null,
        //         'status'      => 'in-progress',
        //         'featured'    => false,
        //         'sort_order'  => 5,
        //     ],
        //     [
        //         'title'       => 'DataViz Studio',
        //         'description' => 'Interactive data visualization platform for creating stunning charts and dashboards. Supports multiple data sources and collaborative features.',
        //         'thumbnail'   => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=400&fit=crop&auto=format',
        //         'images'      => [],
        //         'tech_stack'  => ['Python', 'Streamlit', 'Plotly', 'Pandas', 'SQLAlchemy'],
        //         'category'    => 'data',
        //         'github_url'  => 'https://github.com/yourusername/dataviz-studio',
        //         'demo_url'    => 'https://dataviz-studio.streamlit.app',
        //         'status'      => 'completed',
        //         'featured'    => false,
        //         'sort_order'  => 6,
        //     ],
        // ];

        // foreach ($projects as $data) {
        //     Project::create($data);
        // }

        // // ─── Skills ──────────────────────────────────────────────────────────
        // $skills = [
        //     // Web
        //     ['name' => 'HTML/CSS/JavaScript', 'category' => 'web', 'proficiency' => 90, 'sort_order' => 1],
        //     ['name' => 'React',               'category' => 'web', 'proficiency' => 80, 'sort_order' => 2],
        //     ['name' => 'Node.js',             'category' => 'web', 'proficiency' => 75, 'sort_order' => 3],
        //     ['name' => 'Laravel/PHP',         'category' => 'web', 'proficiency' => 80, 'sort_order' => 4],
        //     ['name' => 'Database Management', 'category' => 'web', 'proficiency' => 70, 'sort_order' => 5],
        //     ['name' => 'UI/UX Design',        'category' => 'web', 'proficiency' => 55, 'sort_order' => 6],
        //     // Data
        //     ['name' => 'Python/R',            'category' => 'data', 'proficiency' => 85, 'sort_order' => 1],
        //     ['name' => 'Machine Learning',    'category' => 'data', 'proficiency' => 20, 'sort_order' => 2],
        //     ['name' => 'Data Visualization',  'category' => 'data', 'proficiency' => 82, 'sort_order' => 3],
        //     ['name' => 'Statistical Analysis', 'category' => 'data', 'proficiency' => 70, 'sort_order' => 4],
        //     ['name' => 'Big Data Technologies', 'category' => 'data', 'proficiency' => 75, 'sort_order' => 5],
        // ];

        // foreach ($skills as $data) {
        //     Skill::create($data);
        // }

        // // ─── Experiences ─────────────────────────────────────────────────────
        // $experiences = [
        //     [
        //         'year'        => '2025',
        //         'title'       => 'Suvi Training',
        //         'role'        => 'Web Development NodeJS & React',
        //         'description' => 'Participated in a web development training program focusing on modern JavaScript technologies to enhance full-stack development capabilities.',
        //         'type'        => 'training',
        //         'sort_order'  => 1,
        //     ],
        //     [
        //         'year'        => '2025',
        //         'title'       => 'Surya Raya Badminton',
        //         'role'        => 'Administrative Staff',
        //         'description' => 'Responsible for daily administrative operations, documentation, and financial record management. Assisted internal coordination and maintained effective communication.',
        //         'type'        => 'work',
        //         'sort_order'  => 2,
        //     ],
        //     [
        //         'year'        => '2025',
        //         'title'       => 'PT Tambang Raya Usaha Tama',
        //         'role'        => 'Data Manager & Data Entry',
        //         'description' => 'Managed and validated daily operational data using Microsoft Excel, ensuring data accuracy before transferring it to the main file. Strengthened analytical and organizational skills.',
        //         'type'        => 'work',
        //         'sort_order'  => 3,
        //     ],
        //     [
        //         'year'        => '2024',
        //         'title'       => 'Politeknik Negeri Samarinda',
        //         'role'        => 'Final Project: Web Development',
        //         'description' => 'Designed and implemented a web-based Point of Sales (POS) application using Laravel and UML methodology. Conducted blackbox testing to ensure reliability.',
        //         'type'        => 'education',
        //         'sort_order'  => 4,
        //     ],
        //     [
        //         'year'        => '2023',
        //         'title'       => 'GreenNusa Computindo',
        //         'role'        => 'Web Development Intern',
        //         'description' => 'Developed dynamic web pages using Laravel Framework while learning database management and responsive design fundamentals.',
        //         'type'        => 'work',
        //         'sort_order'  => 5,
        //     ],
        // ];

        // foreach ($experiences as $data) {
        //     Experience::create($data);
        // }

        // // ─── Achievements ─────────────────────────────────────────────────────────────
        // $achievements = [
        //     [
        //         'title'          => 'Web Development Bootcamp',
        //         'issuer'         => 'Suvi Training',
        //         'type'           => 'course',
        //         'image'          => null,
        //         'credential_url' => null,
        //         'year'           => '2025',
        //         'sort_order'     => 1,
        //     ],
        //     [
        //         'title'          => 'Laravel Framework Certification',
        //         'issuer'         => 'GreenNusa Computindo',
        //         'type'           => 'certification',
        //         'image'          => null,
        //         'credential_url' => null,
        //         'year'           => '2023',
        //         'sort_order'     => 2,
        //     ],
        // ];

        // foreach ($achievements as $data) {
        //     \App\Models\Achievement::create($data);
        // }

        // // ─── Educations ───────────────────────────────────────────────────────────────
        // $educations = [
        //     [
        //         'institution' => 'Politeknik Negeri Samarinda',
        //         'degree'      => 'Diploma (D3)',
        //         'field'       => 'Informatics Engineering',
        //         'start_year'  => '2021',
        //         'end_year'    => '2024',
        //         'location'    => 'Samarinda, East Kalimantan',
        //         'gpa'         => '3.50',
        //         'logo'        => null,
        //         'sort_order'  => 1,
        //     ],
        // ];

        // foreach ($educations as $data) {
        //     \App\Models\Education::create($data);
        // }

        // ─── Settings ─────────────────────────────────────────────────────────────────
        \App\Models\Setting::set('resume_url', '');
        \App\Models\Setting::set('site_name', 'Zidane Abbas Mallaniung');
        \App\Models\Setting::set('site_email', 'zidaneabbasmallaniung@gmail.com');
        \App\Models\Setting::set('site_location', 'Balikpapan, East Kalimantan');
    }
}