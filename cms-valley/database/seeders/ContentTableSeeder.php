<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // About Us seeders start here
            ['name' => "Introduction ", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 1, 'content_type' => "text"],
            ['name' => "Quote", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 1, 'content_type' => "text"],
            ['name' => "Image Upload", 'content_value' => "Image_name", 'section_id' => 1, 'content_type' => "image"],

            ['name' => "Message", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 2, 'content_type' => "text"],
            ['name' => "Founder's Name", 'content_value' => " Krishna Prasad Adhikari", 'section_id' => 2, 'content_type' => "text"],
            ['name' => "Designation", 'content_value' => "Founder-Principal", 'section_id' => 2, 'content_type' => "text"],
            ['name' => "Image Upload", 'content_value' => "Image_name", 'section_id' => 2, 'content_type' => "image"],

            ['name' => "Message", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 3, 'content_type' => "text"],
            ['name' => "Founder's Name", 'content_value' => " Major (Retd) Lilbahadur Gurung MBE", 'section_id' => 3, 'content_type' => "text"],
            ['name' => "Designation", 'content_value' => "Chairman", 'section_id' => 3, 'content_type' => "text"],
            ['name' => "Image Upload", 'content_value' => "Image_name", 'section_id' => 3, 'content_type' => "image"],

            ['name' => "Mission", 'content_value' => " It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 'section_id' => 4, 'content_type' => "text"],
            ['name' => "Core Values", 'content_value' => " Major (Retd) Lilbahadur Gurung MBE", 'section_id' => 4, 'content_type' => "text"],
            ['name' => "Image Upload", 'content_value' => "Image_name", 'section_id' => 4, 'content_type' => "image"],

            // About us page seeder ends here

            //Academics Page Seeder Starts Here
            //Elementary School Contents
            ['name' => "Description ", 'content_value' => " At Valley Public High School, our Elementary School program is designed to create a warm and nurturing environment where young minds are encouraged to explore and grow.
            Our curriculum is tailored to stimulate curiosity and foster a love for learning. Our experienced educators employ a blend of traditional and modern teaching methods to ensure each student receives a well-rounded education.", 'section_id' => 5, 'content_type' => "text"],
            ['name' => "Key Highlights", 'content_value' => " Personalized Learning: Focus on individual strengths and areas for growth.A Integrated Curriculum: A blend of academic subjects with creative arts and physical education.Skill Development: Emphasis on developing communication, problem-solving, and critical thinking skills.", 'section_id' => 5, 'content_type' => "text"],
            ['name' => "Quote", 'content_value' => "Nurturing the Foundation for Lifelong Learning", 'section_id' => 5, 'content_type' => "text"],
            ['name' => "Image Uplaod", 'content_value' => "Minimum image width: 1500px (Multiple images turn into a slideshow)", 'section_id' => 5, 'content_type' => "image"],
            //Middle School Contents
            ['name' => "Description", 'content_value' => "The Middle School at Valley Public High School acts as a crucial bridge between the foundational learning of elementary school and the more specialized and rigorous education of high school. Our curriculum is thoughtfully designed to build upon earlier learning while introducing new academic challenges and personal development opportunities.", 'section_id' => 6, 'content_type' => "text"],
            ['name' => "Key Highlights", 'content_value' => "Personalized Learning: Focus on individual strengths and areas for growth.A
            Integrated Curriculum: A blend of academic subjects with creative arts and physical education.
            Skill Development: Emphasis on developing communication, problem-solving, and critical thinking skills.", 'section_id' => 6, 'content_type' => "text"],
            ['name' => "Quote", 'content_value' => "Nurturing the Foundation for Lifelong Learning", 'section_id' => 6, 'content_type' => "text"],
            ['name' => "Image Uplaod", 'content_value' => "Minimum image width: 1500px (Multiple images turn into a slideshow)", 'section_id' => 6, 'content_type' => "image"],
            //High School Contents
            ['name' => "Description", 'content_value' => "Our High School program offers a comprehensive and challenging curriculum that prepares students for higher education and beyond. Students are encouraged to think critically, communicate effectively, and engage with a global perspective.", 'section_id' => 7, 'content_type' => "text"],
            ['name' => "Key Highlights", 'content_value' => "Personalized Learning: Focus on individual strengths and areas for growth.A
            Integrated Curriculum: A blend of academic subjects with creative arts and physical education.
            Skill Development: Emphasis on developing communication, problem-solving, and critical thinking skills.", 'section_id' => 7, 'content_type' => "text"],
            ['name' => "Quote", 'content_value' => "Nurturing the Foundation for Lifelong Learning", 'section_id' => 7, 'content_type' => "text"],
            ['name' => "Image Uplaod", 'content_value' => "Minimum image width: 1500px (Multiple images turn into a slideshow)", 'section_id' => 7, 'content_type' => "image"],
            //Art and Athletics School Contents
            ['name' => "Description", 'content_value' => "At Valley Public High School, we believe in the holistic development of our students. Our Arts & Athletics programs provide students with the opportunity to explore their interests and talents in various creative and physical pursuits.", 'section_id' => 8, 'content_type' => "text"],
            ['name' => "Key Highlights", 'content_value' => "Personalized Learning: Focus on individual strengths and areas for growth.A
            Integrated Curriculum: A blend of academic subjects with creative arts and physical education.
            Skill Development: Emphasis on developing communication, problem-solving, and critical thinking skills.", 'section_id' => 8, 'content_type' => "text"],
            ['name' => "Quote", 'content_value' => "Nurturing the Foundation for Lifelong Learning", 'section_id' => 8, 'content_type' => "text"],
            ['name' => "Image Uplaod", 'content_value' => "Minimum image width: 1500px (Multiple images turn into a slideshow)", 'section_id' => 8, 'content_type' => "image"],
            //Extracurricular Activities
            ['name' => "Description", 'content_value' => "Our Extracurricular Activities are designed to complement the academic curriculum and provide students with opportunities to explore new interests, develop talents, and build leadership skills.", 'section_id' => 9, 'content_type' => "text"],
            ['name' => "Key Highlights", 'content_value' => "Personalized Learning: Focus on individual strengths and areas for growth.A
            Integrated Curriculum: A blend of academic subjects with creative arts and physical education.
            Skill Development: Emphasis on developing communication, problem-solving, and critical thinking skills.", 'section_id' => 9, 'content_type' => "text"],
            ['name' => "Quote", 'content_value' => "Nurturing the Foundation for Lifelong Learning", 'section_id' => 9, 'content_type' => "text"],
            ['name' => "Image Uplaod", 'content_value' => "Minimum image width: 1500px (Multiple images turn into a slideshow)", 'section_id' => 9, 'content_type' => "image"],

            //Academics Page Seeder Ends Here



        ];
        foreach ($contents as $content) {
            Content::create($content);
        }
    }
}
