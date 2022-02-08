<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateExamsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('exams', function (BluePrint $table) {

				$table->id();
				$table->string('e_name');
				$table->date('e_date');
				$table->time('start_time');
				$table->time('end_time');
				$table->integer('e_room_id', true);
				$table->string('supervisor_id');
			}); 

		} 

		/**
		* Modify Migrations
		*
		* @return void
		*/ 
		public function alter()
		{

			Schema::modify('exams', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('exams');
     
		} 

}