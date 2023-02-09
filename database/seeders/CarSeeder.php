<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([

            [
                'name' => 'أودي',
                'slug' => 'أودي',
                'photo' => 'images/cars/أودي-Audi.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')

            ],
            [
                'name' => 'الفا روميو',
                'slug' =>'الفا-روميو',
                'photo' => 'images/cars/الفا-روميو-Alfa-Romeo.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'ايسوزو',
                'slug' =>'ايسوزو',
                'photo' => 'images/cars/ايسوزو-Isuzu.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'ام جي',
                'slug' =>'ام-جي',
                'photo' => 'images/cars/ام-جي-Mg.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'اوبل',
                'slug' =>'اوبل',
                'photo' => 'images/cars/اوبل-Opel.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'بروتن',
                'slug' =>'بروتن',
                'photo' => 'images/cars/بروتن-Proton.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'بي ام دبليو',
                'slug' =>'بي-ام-دبليو',
                'photo' => 'images/cars/بي-ام-دبليو-Bmw.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'بريليانس',
                'slug' =>'بريليانس',
                'photo' => 'images/cars/بريليانس-Brilliance.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'بي واي دي',
                'slug' =>'بي-واي-دي',
                'photo' => 'images/cars/بي-واي-دي-Byd.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'بيجو',
                'slug' =>'بيجو',
                'photo' => 'images/cars/بيجو-Peugeot.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'بورش',
                'slug' =>'بورش',
                'photo' => 'images/cars/بورش-Porsche.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'توياتا',
                'slug' =>'توياتا',
                'photo' => 'images/cars/توياتا-Toyota.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'دايو',
                'slug' =>'دايو',
                'photo' => 'images/cars/دايو-Daewoo.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'دوج',
                'slug' =>'دوج',
                'photo' => 'images/cars/دوج-Dodge.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'جيلي',
                'slug' =>'جيلي',
                'photo' => 'images/cars/جيلي-Geely.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'جاكور',
                'slug' =>'جاكور',
                'photo' => 'images/cars/جاكور-Jaguar.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'جيب',
                'slug' =>'جيب',
                'photo' => 'images/cars/جيب-Jeep.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'رينو',
                'slug' =>'رينو',
                'photo' => 'images/cars/رينو-Renault.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'سكودا',
                'slug' =>'سكودا',
                'photo' => 'images/cars/سكودا-Skoda.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'سوبارو',
                'slug' =>'سوبارو',
                'photo' => 'images/cars/سوبارو-Subaru.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'شيفروليه',
                'slug' =>'شيفروليه',
                'photo' => 'images/cars/شيفروليه-Chevrolet.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'سيتروين',
                'slug' =>'سيتروين',
                'photo' => 'images/cars/سيتروين-Citroen.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'فورد',
                'slug' =>'فورد',
                'photo' => 'images/cars/فورد-Ford.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'سيات',
                'slug' =>'سيات',
                'photo' => 'images/cars/سيات-Seat.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'سوزوكي',
                'slug' =>'سوزوكي',
                'photo' => 'images/cars/سوزوكي-Suzuki.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'كرايسلر',
                'slug' =>'كرايسلر',
                'photo' => 'images/cars/كرايسلر-Chrysler.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'كيا',
                'slug' =>'كيا',
                'photo' => 'images/cars/كيا-Kia.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'فولكس فاجن',
                'slug' =>'فولكس-فاجن',
                'photo' => 'images/cars/فولكس-فاجن-Volkswagen.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'فولفو',
                'slug' =>'فولفو',
                'photo' => 'images/cars/فولفو-Volvo.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'لاند روفر',
                'slug' =>'لاند-روفر',
                'photo' => 'images/cars/لاند-روفر-Land-Rover.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'مازدا',
                'slug' =>'مازدا',
                'photo' => 'images/cars/مازدا-Mazda.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'مرسيدس بنز',
                'slug' =>'مرسيدس-بنز',
                'photo' => 'images/cars/مرسيدس-بنز-Mercedes-Benz.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'ميني كوبر',
                'slug' =>'ميني-كوبر',
                'photo' => 'images/cars/ميني-كوبر-Mini-Cooper.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'ميتسوبيشي',
                'slug' =>'ميتسوبيشي',
                'photo' => 'images/cars/ميتسوبيشي-Mitsubishi.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'نيسان',
                'slug' =>'نيسان',
                'photo' => 'images/cars/نيسان-Nissan.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'همر',
                'slug' =>'همر',
                'photo' => 'images/cars/همر-Hummer.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'هيونداي',
                'slug' =>'هيونداي',
                'photo' => 'images/cars/هيونداي-Hyundai.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'هوندا',
                'slug' =>'هوندا',
                'photo' => 'images/cars/34773431371_74b3ebaee6_b-(1).webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'لكزس',
                'slug' =>'لكزس',
                'photo' => 'images/cars/لكزس-Lexus.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'ديهاتسو',
                'slug' =>'ديهاتسو',
                'photo' => 'images/cars/ديهاتسو-Daihatsu.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'جمس',
                'slug' =>'جمس',
                'photo' => 'images/cars/جمس-Gmc.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'رولز رويس',
                'slug' =>'رولز-رويس',
                'photo' => 'images/cars/رولز-رويس-Rolls-Royce.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'لمبرجيني',
                'slug' =>'لمبرجيني',
                'photo' => 'images/cars/لمبرجيني-Lamborghini.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'بوغاتي',
                'slug' =>'بوغاتي',
                'photo' => 'images/cars/بوغاتي-Bugatti.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'بنتلي',
                'slug' =>'بنتلي',
                'photo' => 'images/cars/بنتلي-Bentley.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'كاديلاك',
                'slug' =>'كاديلاك',
                'photo' => 'images/cars/كاديلاك-Cadillac.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'فيرارى',
                'slug' =>'فيرارى',
                'photo' => 'images/cars/فيرارى-Ferrari.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'مازيراتي',
                'slug' =>'مازيراتي',
                'photo' => 'images/cars/مازيراتي-maserati.webp',
                'active' => '1',
                'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
            ]

        ]);
    }
}
