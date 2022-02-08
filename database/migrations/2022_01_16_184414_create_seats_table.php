<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateSeatsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('seats', function (BluePrint $table) {

				$table->id();
				$table->integer('room_id', true);
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

			Schema::modify('seats', function (BluePrint $table) {

				 $table->addColumn('occupied', 'INT', 5, false, 0)->after('room_id');
				 $table->addColumn('available', 'INT', 5, false, 0)->after('occupied');
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('seats');
     
		} 

}