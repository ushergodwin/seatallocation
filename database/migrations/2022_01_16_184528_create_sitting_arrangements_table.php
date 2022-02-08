<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateSittingArrangementsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('sitting_arrangements', function (BluePrint $table) {

				$table->id();
				$table->integer('room_id', true);
				$table->integer('seat_id', true);
				$table->string('s_no', 15);
				$table->integer('exam_id', true);
				$table->date('dated');
				$table->softDeletes();
			}); 

		} 

		/**
		* Modify Migrations
		*
		* @return void
		*/ 
		public function alter()
		{

			Schema::modify('sitting_arrangements', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('sitting_arrangements');
     
		} 

}