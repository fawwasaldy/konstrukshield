<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    private $helmetNames = [
        "Helmet Ultra-Light Pro", "Mountain Safety Helmet", "Racer Speed Helmet",
        "Comfy Urban Helmet", "Trail Blazer Helmet", "Airflow Protection Helmet",
        "Dynamic Cyclist Helmet", "Explorer Adventure Helmet", "Night Vision Helmet",
        "Safety Guard Helmet", "Eco-Rider Helmet", "Storm Breaker Helmet",
        "Premium Road Helmet", "Skyline Cyclist Helmet", "Rapid Glider Helmet",
        "Extreme Safety Helmet", "Titanium Core Helmet", "Vortex Adventure Helmet",
        "Stealth Mode Helmet", "Shield X Helmet", "Velocity Helmet",
        "Phoenix Protection Helmet", "Nova Light Helmet", "Glacier Ride Helmet",
        "Shadow Guard Helmet", "Desert King Helmet", "Aero Swift Helmet",
        "Impact Pro Helmet", "Ultra Secure Helmet", "X-Trail Helmet",
        "Fusion Guard Helmet", "Peak Performer Helmet", "Road King Helmet",
        "Throne Cyclist Helmet", "Ironclad Helmet", "Horizon Rider Helmet",
        "Guardian Angel Helmet", "Turbo Cyclist Helmet", "Trail Hawk Helmet",
        "Summit Seeker Helmet", "Cloud Runner Helmet", "Rapid Cyclone Helmet",
        "Falcon Safety Helmet", "Lightning Speed Helmet", "Rider's Choice Helmet",
        "Stormproof Helmet", "Xtreme Adventure Helmet", "Black Hawk Helmet",
        "Elite Cyclist Helmet", "NextGen Safety Helmet", "AirShield Helmet"
    ];

    private $vestNames = [
        "Adventure Utility Vest", "Lightweight Sports Vest", "Tactical Outdoor Vest",
        "Waterproof Trail Vest", "Reflective Safety Vest", "Comfy Fit Vest",
        "All-Season Durable Vest", "Explorer's Travel Vest", "Breathable Running Vest",
        "Weather Resistant Vest", "Flex Armor Vest", "Daylight Reflective Vest",
        "Endurance Runner Vest", "Trail Comfort Vest", "Urban Trek Vest",
        "Eco-Friendly Utility Vest", "Pro Cyclist Vest", "Streamline Fit Vest",
        "Rider's Adventure Vest", "Summit Gear Vest", "Lightweight Guard Vest",
        "Extreme Weather Vest", "High-Performance Vest", "TrekPro Safety Vest",
        "Arctic Explorer Vest", "Mountain Guardian Vest", "Ironclad Outdoor Vest",
        "Rainproof Trail Vest", "All-Terrain Vest", "Velocity Sports Vest",
        "StormRunner Vest", "Dynamic Outdoor Vest", "CloudHiker Vest",
        "GlacierGuard Vest", "Peak Warrior Vest", "Hunter's Choice Vest",
        "Nomad Travel Vest", "Falcon Trail Vest", "Skyline Trek Vest",
        "Stealth Gear Vest", "RapidFlex Vest", "Summit Tracker Vest",
        "EvoFit Sports Vest", "Horizon Trail Vest", "WeatherMaster Vest",
        "IronShield Vest", "AirComfort Vest", "TrailBlaze Vest", "EliteGuard Vest",
        "Xtreme Hiker Vest", "SunRunner Vest"
    ];

    private $helmetDescriptions = [
        "Designed for unparalleled safety and comfort.",
        "A must-have for every adventurous cyclist.",
        "Engineered to provide maximum airflow.",
        "Combines style and protection in one.",
        "Certified for extreme weather resilience.",
        "Ideal for mountain trails and city streets.",
        "Offers unmatched impact resistance.",
        "Enhanced with reflective detailing.",
        "Comes with detachable accessories.",
        "Lightweight and highly durable for all-day wear.",
        "Innovative design for superior head protection.",
        "Built with shock-absorption technology.",
        "Advanced aerodynamics for better performance.",
        "Sleek design tailored for professional riders.",
        "Tested for the toughest conditions.",
        "Perfect for casual and professional cycling.",
        "Streamlined for reduced wind resistance.",
        "Padded interior for maximum comfort.",
        "Provides full coverage and ultimate safety.",
        "Adjustable straps for a secure fit.",
        "High-visibility design for night riding.",
        "Compact and easy to carry on trips.",
        "Durable material for long-lasting use.",
        "Extra ventilation for hot weather rides.",
        "Compatible with helmet-mounted cameras.",
        "Equipped with a sun visor for bright days.",
        "Stylish design for all age groups.",
        "Crafted with lightweight composite material.",
        "Ensures a snug fit for various head sizes.",
        "Perfect balance between weight and durability.",
        "Adds confidence for daring stunts.",
        "Cushioned for reduced strain on long rides.",
        "Designed for urban and off-road use.",
        "Weatherproof and easy to clean.",
        "Exclusive design for competitive racers.",
        "Highly rated for its innovative features.",
        "Trusted by athletes worldwide.",
        "Antimicrobial lining for added hygiene.",
        "Engineered for high-impact sports.",
        "Dynamic design for superior airflow.",
        "Ergonomic shape for long-term wear.",
        "Pairs well with cycling accessories.",
        "Tested to meet global safety standards.",
        "Bold design for adventurous spirits.",
        "Compact yet highly protective.",
        "Light as a feather, strong as steel.",
        "Provides optimal visibility for riders.",
        "Secure fit with customizable padding.",
        "Designed with eco-friendly materials.",
        "Revolutionary design for fearless riders.",
        "Sets a new standard for cycling helmets."
    ];

    private $vestDescriptions = [
        "Crafted for durability and style.",
        "Perfect for outdoor adventures in any weather.",
        "Equipped with multiple utility pockets.",
        "Reflective strips for enhanced visibility.",
        "Made from eco-friendly materials.",
        "Adjustable straps ensure a custom fit.",
        "Built for comfort during long treks.",
        "Engineered for extreme weather conditions.",
        "Combines sleek design with functionality.",
        "Perfect for running, hiking, and exploring.",
        "Lightweight material for easy movement.",
        "Ideal for professional and casual use.",
        "Reinforced stitching for added durability.",
        "Breathable fabric for maximum comfort.",
        "Offers protection against harsh winds.",
        "Designed for all-season wear.",
        "Easily washable and quick-drying.",
        "Water-resistant coating for rainy days.",
        "Enhanced safety features for night activities.",
        "Compact design for easy packing.",
        "Perfect choice for extreme sports enthusiasts.",
        "Customizable fit for all body types.",
        "Stylish look for everyday wear.",
        "Built to withstand rugged terrains.",
        "Made with premium-quality fabric.",
        "Integrated hydration system for long trips.",
        "Weatherproof design for ultimate protection.",
        "Multi-functional and highly durable.",
        "Provides added warmth in cold climates.",
        "Perfect balance of comfort and functionality.",
        "Designed with hikers in mind.",
        "Elastic panels for enhanced mobility.",
        "Combines ruggedness with modern style.",
        "Includes detachable pouches for tools.",
        "Padded for added comfort on long trips.",
        "Minimalistic design with maximum utility.",
        "Trusted choice among outdoor enthusiasts.",
        "Reflective accents for safety in low light.",
        "Anti-tear material for tough environments.",
        "Adjustable waistband for a perfect fit.",
        "Fashion-forward design for urban explorers.",
        "Tested for extreme durability.",
        "Blends form and function seamlessly.",
        "Perfect companion for camping trips.",
        "Equipped with high-performance zippers.",
        "Adds versatility to your outdoor gear.",
        "Windproof yet breathable construction.",
        "Enhanced mobility for active lifestyles.",
        "Ultra-lightweight for hassle-free travel.",
        "Designed with sustainability in mind.",
        "A must-have for adventure seekers."
    ];

    public function run()
    {
        $items = $this->generateSeedingData();
        foreach ($items as $item) {
            Product::create($item);
        }
    }

    private function generateSeedingData()
    {
        $items = [];
        foreach ($this->helmetNames as $i => $name) {
            $items[] = [
                "name" => $name,
                "image" => "https://cyanstar.blob.core.windows.net/konstrukshield/helmet_" . (($i % 10) + 1) . ".jpg",
                "price" => rand(100000, 1000000),
                "description" => $this->helmetDescriptions[$i % count($this->helmetDescriptions)],
                "category" => "helmet",
                "discount" => rand(0, 5) * 10,
                "rating" => round(rand(10, 50) / 10, 1),
            ];
        }

        foreach ($this->vestNames as $i => $name) {
            $items[] = [
                "name" => $name,
                "image" => "https://cyanstar.blob.core.windows.net/konstrukshield/vest_" . (($i % 10) + 1) . ".jpg",
                "price" => rand(30000, 300000),
                "description" => $this->vestDescriptions[$i % count($this->vestDescriptions)],
                "category" => "vest",
                "discount" => rand(0, 5) * 10,
                "rating" => round(rand(10, 50) / 10, 1),
            ];
        }

        return $items;
    }
}
