####Implement Feature Testing in Laravel for REST APIs

`php artisan make:model Hotel`  
php artisan make:model Review  

php artisan make:migration create_hotel_table	  
php artisan make:migration create_review_table

##### Hotel Table  
```
public function up()
{
  Schema::create('hotels', function (Blueprint $table) {
     $table->bigIncrements('id')->unsinged();
     $table->string('name', 100);
     $table->text('address')->nullable();
     $table->float('star')->nullable();
    $table->tinyInteger('active')->default(1)->comment = '1 = active,0 = Inactive';
     $table->timestamps();
     $table->softDeletes();
  });
}
```
##### Review Table 
```
public function up()
{
   Schema::create('reviews', function (Blueprint $table) {
      $table->bigIncrements('id')->unsinged();
      $table->string('title', 100);
      $table->text('description', 100);
      $table->unsignedBigInteger('user_id')->nullable();
      $table->unsignedBigInteger('hotel_id')->nullable();
      $table->timestamps(); 
      $table->softDeletes(); 
      $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('CASCADE')->onUpdate('CASCADE');
   });
 }
```
HotelFactory.php   
```
public function definition()
    {
        $starMin = 1;
        $starMax = 5;
        return [
            'name' => $this->faker->word(30),
            'address' => $this->faker->address,
            'star' => $this->faker->numberBetween($starMin, $starMax),
            'active' => $this->faker->numberBetween(1,0)
        ];
    }
```
HotelSeeder.php   
```
public function run()
    {
        Hotel::factory(30)->create();
    }
```
##### Run migration
php artisan migrate   
##### Seed
https://github.com/fzaninotto/Faker  

php artisan migrate --seed     // all tables   
php artisan db:seed --class=HotelSeeder   // only Hotels table   
