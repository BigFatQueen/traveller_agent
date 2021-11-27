<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //city table
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('parent_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        //type table
        Schema::create('types', function (Blueprint $table) {
             $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('fcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->BigInteger('type_id')->unsigned();
            $table->foreign('type_id')
                    ->references('id')
                    ->on('types')
                    ->onDelete('cascade');
            $table->softDeletes();

            $table->timestamps();

           
        });

        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price')->default(0);
            $table->BigInteger('fcategory_id')->unsigned();
            $table->foreign('fcategory_id')
                    ->references('id')
                    ->on('fcategories')
                    ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });


        //company
         Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('logo')->nullable();
            $table->string('ceo_name')->nullable();
            $table->text('photo')->nullable();
            $table->string('phone')->nullable();
            $table->text('addresss')->nullable();
            $table->string('incharge_name')->nullable();
            $table->string('incharge_phone')->nullable();
            $table->string('incharge_position')->nullable();
            $table->integer('type')->nullable();
            $table->integer('status')->default(1);
            $table->text('info')->nullable();
            $table->string('service_label_one')->nullable();
            $table->string('service_label_two')->nullable();
            $table->string('service_label_three')->nullable();
            $table->text('service_desc_one')->nullable();
            $table->text('service_desc_two')->nullable();
            $table->text('service_desc_three')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        //car
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('codeno');
            $table->text('photo');
            $table->string('model');
            $table->string('seats');
            $table->integer('doors');
            $table->integer('bags');
            $table->integer('aircon')->default('1');
            $table->integer('status')->default('1');

            $table->BigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->BigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

            $table->BigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');


            $table->BigInteger('company_id')->unsigned();
            
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('priceperday');
            $table->string('discount');
            $table->integer('qty');
            $table->softDeletes();
            $table->timestamps();
           
        });

        //car-city
        Schema::create('car_city', function (Blueprint $table) {
             $table->id();
            $table->BigInteger('car_id')->unsigned();   
            $table->BigInteger('city_id')->unsigned();
             $table->foreign('car_id')
                    ->references('id')
                    ->on('cars')
                    ->onDelete('cascade');
             $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('cascade');
            $table->timestamps();

            
        });

        //car-booking
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code');
            $table->string('booking_date');
            $table->BigInteger('user_id')->unsigned();
            $table->BigInteger('car_id')->unsigned();
            $table->BigInteger('from_city_id')->unsigned()->nullable();
            $table->BigInteger('to_city_id')->unsigned()->nullable();
            $table->string('day');
            $table->string('total');
            $table->BigInteger('pickup_id')->unsigned()->nullable();
            $table->text('custom_pickup');
            $table->string('departure_date');
            $table->text('arrival_date');
            $table->string('pickup_time');
            $table->string('status');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('from_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('to_city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('pickup_id')->references('id')->on('cities')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->BigInteger('type_id')->unsigned();
            $table->text('photos')->nullable();
            $table->integer('wide')->nullable();
            $table->integer('single')->nullable();
            $table->integer('double')->nullable();
            $table->integer('king')->nullable();
            $table->integer('queen')->nullable();
            $table->integer('ppl')->nullable();
            $table->integer('pricepernight')->nullable();
            $table->BigInteger('company_id')->unsigned();
            $table->integer('common')->nullable();
            $table->integer('status');
            $table->softDeletes();

            $table->foreign('type_id')->references('id')
                ->on('types')
                ->onDelete('cascade');

            $table->foreign('company_id')->references('id')
                ->on('companies')
                ->onDelete('cascade');
            $table->timestamps();
        });

         Schema::create('facility_room', function (Blueprint $table) {
            $table->id();

            $table->BigInteger('facility_id')->unsigned();
            $table->BigInteger('room_id')->unsigned();

            $table->foreign('facility_id')
                ->references('id')
                ->on('facilities')
                ->onDelete('cascade');

            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
                ->onDelete('cascade');
                $table->softDeletes();

            $table->timestamps();
        });

        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned();
            $table->string('codeno');
            $table->string('booking_date');
            $table->string('check_in');
            $table->string('check_out');
            $table->BigInteger('room_id')->unsigned();
            $table->integer('days')->nullable();
            $table->integer('total')->nulllable();
            $table->integer('taxfee')->nulllable();
            $table->integer('adult')->nullable();
            $table->integer('child')->nullable();
            $table->integer('status')->default('1');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('msg')->nullable();
            
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('room_id')
                    ->references('id')
                    ->on('rooms')
                    ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
           
        });

       /// tour and package start////
       Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('city_id')->unsigned();
            $table->text('photo')->nullable();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->softDeletes();
             $table->timestamps();
            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('cascade');
        });

        

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc')->nullable();
            $table->BigInteger('depart_id')->unsigned();
            $table->BigInteger('arrive_id')->unsigned();
            $table->date('start');
            $table->date('end');
            $table->BigInteger('priceperperson');
            $table->BigInteger('discount')->default(0);
            $table->BigInteger('days')->nullable();
            $table->BigInteger('ppl');
            $table->BigInteger('company_hotel_id')->unsigned();
            $table->BigInteger('company_car_id')->unsigned();
            $table->integer('status')->default(1);

            $table->foreign('depart_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('cascade');

            $table->foreign('arrive_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('cascade');

            $table->foreign('company_hotel_id')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade');

            $table->foreign('company_car_id')
                    ->references('id')
                    ->on('cars')
                    ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();

        });
        
        Schema::create('tours_packages', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('tour_id')->unsigned();
            $table->foreign('tour_id')
                    ->references('id')
                    ->on('tours')
                    ->onDelete('cascade');
            $table->BigInteger('package_id')->unsigned();
            $table->foreign('package_id')
                    ->references('id')
                    ->on('packages')
                    ->onDelete('cascade');
            $table->integer('status')->default(1);
            $table->softDeletes();
             $table->timestamps();
        });
        

        Schema::create('package_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('codeno');
            $table->BigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->BigInteger('package_id')->unsigned();
            $table->foreign('package_id')
                    ->references('id')
                    ->on('packages')
                    ->onDelete('cascade');
            $table->text('msg')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('ppl')->default(1);
            $table->BigInteger('total');
            $table->softDeletes();
             $table->timestamps();
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned();
            $table->BigInteger('car_id')->unsigned()->nullable();
            $table->BigInteger('company_hotel_id')->unsigned()->nullable();

            $table->BigInteger('type_id')->unsigned();
            $table->integer('rate')->default(0);

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->foreign('car_id')
                    ->references('id')
                    ->on('cars')
                    ->onDelete('cascade');

            $table->foreign('company_hotel_id')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade');

            $table->foreign('type_id')
                    ->references('id')
                    ->on('types')
                    ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();

           
        });

         Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned();
            $table->text('message')->nullable();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();

           
        });

         Schema::create('emailcontacts', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
         Schema::dropIfExists('types');
         Schema::dropIfExists('brands');
         Schema::dropIfExists('fcategories');
         Schema::dropIfExists('facilities');
         Schema::dropIfExists('companies');
         Schema::dropIfExists('cars');
         Schema::dropIfExists('car_city');
         Schema::dropIfExists('bookings');
         Schema::dropIfExists('rooms');
         Schema::dropIfExists('facility_room');
         Schema::dropIfExists('hotel_bookings');
         Schema::dropIfExists('tours');
        Schema::dropIfExists('packages');
        Schema::dropIfExists('tours_packages');
        Schema::dropIfExists('package_bookings');
         Schema::dropIfExists('ratings');
         Schema::dropIfExists('feedbacks');
         Schema::dropIfExists('emailcontacts');
    }
}
