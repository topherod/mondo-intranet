<?php
/*
Template Name: Forms
*/
get_header(); ?>


<div id="page-full-width" class="full-forms" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="forms header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
  </div>

  <div class="select-a-form">
  	<p>What type of question or request do you have?</p>
  	<div class="form-selector" data-form-type="it">I would like to make an IT request.</div>
  	<div class="form-selector" data-form-type="it">I have an equipment request.</div>
  	<div class="form-selector" data-form-type="it">I have a fleet request.</div>
  	<div class="form-selector" data-form-type="it">I have a facility or maintenance request.</div>
  	<div class="form-selector" data-form-type="onboarding">I am a new employee with an onboarding question.</div>
  	<div class="form-selector" data-form-type="onboarding">I have a question about benefits or enrollments.</div>
  	<div class="form-selector" data-form-type="onboarding">I would like to update my employee information (Address changes, etc).</div>
  	<div class="form-selector" data-form-type="payroll">I have a payroll question.</div>
    <div class="form-selector" data-form-type="hr">I would like to file a complaint to HR.</div>
    <div class="form-selector" data-form-type="card">I would like to request new business cards.</div>
    <div class="form-selector" data-form-type="collateral">I would like to request data sheets or Mondo folders.</div>

  </div>

  <div class="contact-forms-area">
		<div class="contact-form" id="itForm">
			<div class="form-back"><span class="fa fa-arrow-left"></span> Back</div>
			<p>Submit the form below for IT Requests, Equipment Requests, Fleet Requests and/or Facility/Maintenance Requests:</p>
		  <?php echo do_shortcode( '[contact-form-7 id="772" title="IT Requests"]' ); ?>
		</div>

		<div class="contact-form" id="onboardingForm">
			<div class="form-back"><span class="fa fa-arrow-left"></span> Back</div>
			<p>Submit the form below for onboarding paperwork, employee information updates (address changes, etc), or benefits inquiries or enrollments:</p>
		  <?php echo do_shortcode( '[contact-form-7 id="736" title="Onboarding Requests"]' ); ?>
		</div>

		<div class="contact-form" id="payrollForm">
			<div class="form-back"><span class="fa fa-arrow-left"></span> Back</div>
			<p>Submit the form below for questions about payroll:</p>
		  <?php echo do_shortcode( '[contact-form-7 id="738" title="Payroll Questions"]' ); ?>
		</div>

    <div class="contact-form" id="hrForm">
      <div class="form-back"><span class="fa fa-arrow-left"></span> Back</div>
      <p>Submit the form below to file a complaint to HR:</p>
      <?php echo do_shortcode( '[contact-form-7 id="737" title="Complaint (HR)"]' ); ?>
    </div>

    <div class="contact-form" id="cardForm">
      <div class="form-back"><span class="fa fa-arrow-left"></span> Back</div>
      <p>Submit the form below to request new business cards:</p>
      <?php echo do_shortcode( '[contact-form-7 id="1088" title="Business Card Request Form"]' ); ?>
    </div>

    <div class="contact-form" id="collateralForm">
      <div class="form-back"><span class="fa fa-arrow-left"></span> Back</div>
      <p>Submit the form below to request marketing materials:</p>
      <?php echo do_shortcode( '[contact-form-7 id="1091" title="Marketing Collateral Form"]' ); ?>
    </div>

	</div>


<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer(); ?>
