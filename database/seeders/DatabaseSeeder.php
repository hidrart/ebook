<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "username" => "User",
            "email" => "amazinguser@gmail.com",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi"
        ]);
        
        User::create([
            "username" => "Admin",
            "email" => "amazingadmin@gmail.com",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role" => "admin"
        ]);
        
        User::factory(20)->create();
        Book::factory(50)->create();

        Book::create([
            "title" => "Laskar Pelangi",
            "author" => "Andrea Hirata",
            "description" => "Belitung is known for its richness in tin, making it one of Indonesia's richest islands, though bureaucracy keeps its natives from enjoying it, turning most of them poor and some unemployed; most men ended up working at the state-owned tin company PN Timah. Children of poor households are stereotyped as having no future who will end up working there.

            In 1974, SD Muhammadiyah Gantong, taught by Ms. Muslimah, Mr. Harfan, and Mr. Bakri, awaits ten students as required by law. The school is small and poor, resulting in not having a student for a long time. The first student is Lintang, a boy living in the coastal area whose father is a fisherman, leaving him unschooled. Soon, more join: Ikal, Mahar, Sahara, A Kiong, Borek, Kucai, Syahdan, and Trapan. With only nine students, the school loses hope, until the tenth student, Harun arrives. Five years later, the students have formed a strong bond. One day, they see a rainbow forming, and Muslimah dubs the students \"Laskar Pelangi\" (\"The Rainbow Troops\"). Through the Islam sessions, Harfan teaches them various lessons of perseverance and humbleness. Zulkarnaen, Muhammadiyahl's assistant, expresses doubt over the legacy of it after the students graduate sixth grade, but Harfan insists, stating it is the only school around that does not prioritize grades; such schools show more success rate in students.
            
            Mr. Mahmud, a teacher at SD PN Timah, has unrequited love for Muslimah and frequently asks her to join his school while belittling her school; Muslimah always rejects this. However it is regulated that Muhammadiyah have their final exam at SD PN. During the succeeding holiday, the boys meet Flo, an SD PN student who gives Mahar one of her National Geographic collections featuring the Asmat tribe. Mahar, skillful in art, is assigned by Muslimah to form an idea for the Independence Day carnival competition, and he proposes an Asmat-style dance. They were initially laughed at, but later applauded and declared winner. Flo, with a thematic appreciation towards their dance, decides to join Muhammadiyah. Since then, the students' grades begin decreasing. Meanwhile, Bakri reveals to Muslimah and Harfan that he accepted an offer to teach at SD Negri Bangka. When they confront him, he belittles the school; Muslimah and Harfan take this as a godsent motivation to work harder.
            
            Muslimah observes Harfan's facial pallor. His wife reveals to him that he refuses to follow her advice. A few days later, Muslimah finds him dead at his desk. Grieving, she does not teach for five days, unannounced. Despite so, the students continue learning by themselves and keep pushing each other to study, warming Muslimah's heart and brings her back to teaching. Some time later, a Gantong scholastic tournament is announced. For Muhammadiyah, Mahar, Ikal, and Lintang participate. Thanks to Lintang's arithmetic ability, they win. During the tournament day, however, his father goes fishing impromptu, and dies while doing so. Having need to take care of his two siblings, he reluctantly announces to not be in the school anymore, and says goodbye one last time.
            
            In 1999, Belitung, heavily reliant on their tin industry, was severely affected by the 1980 tin crisis and PN Timah subsequently went bankrupt. Ikal visits his home and meets Lintang, who now has a wife and smart daughter. Ikal reveals that he received a scholarship at Sorbonne, Paris, his childhood dream city, inspired by an illustration given by former love interest A Ling, who is A Kiong's cousin. It is also revealed that Mahar is now a novelist. Later at Sorbonne, Ikal sends Lintang a letter with an Eiffel Tower illustration; he shows it to his daughter to motivate her.
            
            The film ends with a quote from the 35th chapter of the Constitution of Indonesia: \"Every citizen has the right to get proper education.\""
        ]);
    }
}
