<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('father')->nullable();
            $table->string('address')->nullable();
            $table->string('designation')->nullable();
            $table->string('identification_mark')->nullable();
            $table->string('work_at_hazardous_process')->nullable();
            $table->string('work_at_dangerous_operation')->nullable();
            $table->string('mobile_no');
            $table->date('dob');
            $table->integer('age')->nullable();
            $table->string('employee_id');
            $table->string('gender');
            $table->string('blood_group');
            $table->date('last_donate_date')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->float('bmi')->nullable();
            $table->integer('pulse')->nullable();
            $table->string('present_complaints')->nullable();
            $table->string('treatment_history')->nullable();
            $table->string('past_surgery_details')->nullable();
            $table->string('family_history')->nullable();
            $table->string('occupational_risk')->nullable();
            $table->string('allergies_skin_risks')->nullable();
            $table->string('cardiovascular_system')->nullable();
            $table->string('respiratory_system')->nullable();
            $table->string('ear_nose_throat')->nullable();
            $table->string('dental_exam')->nullable();
            $table->string('color_vision')->nullable();
            $table->string('remarks')->nullable();
            $table->string('fit_unfit')->nullable();
            $table->string('reason_for_unfit')->nullable();
            $table->binary('upload_pdf')->nullable();
            $table->binary('worker_signature')->nullable();
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
        Schema::dropIfExists('workers');
    }
}
