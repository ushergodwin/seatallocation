<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateSupervisorsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('supervisors', function (BluePrint $table) {

				$table->id();
				$table->string('sup_name', 60);
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

			Schema::modify('supervisors', function (BluePrint $table) {

				 
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('supervisors');
     
		} 

}