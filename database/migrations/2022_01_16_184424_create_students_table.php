<?php
use System\Database\Schema\BluePrint;
use System\Database\Schema\Schema;


 class CreateStudentsTable
 { 
		/**
		* Run the Migrations
		*
		* @return void
		*/ 
		public function up()
		{

			Schema::create('students', function (BluePrint $table) {

				$table->id();
				$table->string('name', 60);
				$table->string('st_no', 15)->unique();
				$table->string('reg_no', 20)->unique();
				$table->string('secret', 255)->default(sha1('P@ss1234')); 
				$table->timestamp('joined');
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

			Schema::modify('students', function (BluePrint $table) {

				 $table->addColumn('course', 'VARCHAR', 5, false, "BIST")->after('reg_no');
				 $table->addColumn('phone_number', 'VARCHAR', 14, false, "256760422367")->after('course');
				 $table->addColumn('email', 'VARCHAR', 65, false, "brianmugumem@gmail.com")->after('phone_number');
			}); 

		} 

		/**
		* Reverse the migrations.
		*
		* @return void
		*/

		public function down()
		{

			Schema::dropIfExists('students');
     
		} 

}