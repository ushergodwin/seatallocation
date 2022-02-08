<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateRoomsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('rooms', function (BluePrint $table) {

				$table->id();
				$table->string('room_name', 20);
				$table->integer('capacity', true);
				$table->timestamps(); 
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

			Schema::modify('rooms', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('rooms');
     
		} 

}