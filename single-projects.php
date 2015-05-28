<?php

/**
 *	Single Project Template
 *	This file constructs the view for single project
 *	pages.
 */
 
get_header(); ?>

<div class="single-project-container row">
	<div class="medium-8 columns">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
	
	<div id="sidebar" class="medium-4 columns stick-to-parent-side-nav">
		
		<div class="project-needs-container row">
			<div class="project-needs-info small-7 columns">
                
                
                <?php
                    $funds_needed = 70000;
                    $funds_raised = 45985;
                    $funds_deficit = $funds_needed-$funds_raised;
                    $percentage_completed = number_format( ( $funds_raised/$funds_needed)*100 );
                    $percentage_needed = 100 - $percentage_completed;
                ?>
                
				<div class="funds-raised">
                    <?php echo number_format($funds_raised); ?>
                    <span class="currency-denoter">USD</span>
                </div>
				<label class="project-funds-label"><?php echo $percentage_completed; ?>% Raised</label>
                
				<div class="funds-deficit">
                    <?php echo number_format($funds_deficit); ?>
                    <span class="currency-denoter">USD</span>
                </div>
				<label class="project-funds-label"><?php echo $percentage_needed; ?>% From Goal</label>
			</div>
			
			<div class="project-needs-chart-container small-5 columns">
                <div class="chart-container">
                    <canvas id="projectCompletion" width="400" height="400"></canvas>

                    <script>
                        var data = [
                            {
                                value: <?php echo $funds_raised; ?>,
                                color:"#5D9ECB",
                            },
                            {
                                value: <?php echo $funds_deficit; ?>,
                                color: "#CCCCCC",
                            },
                        ];

                        var options = {
                            responsive: true,
                            percentageInnerCutout: 60,
                        };

                        var ctx = document.getElementById("projectCompletion").getContext("2d");
                        var projectCompletion = new Chart(ctx).Doughnut(data,options);
                    </script>
                </div>
			</div>
			
			<div class="small-12 columns">
                <div class="project-meta">
                    <div class="total-needed">Total Needed: <span class="right">$<?php echo number_format( $funds_needed ); ?></span></div>
                    <div class="total-backers">Backers So Far: <span class="right">58 People</span></div>
                    <div class="days-left">Days Left In Campaign: <span class="right">47 Days</span></div>
                </div>
            </div>
		</div>
		
		<div class="project-goals-container">
            
            <?php // Define Custom Variables for the Goals Chart
                $project_goals_chart_data = rwmb_meta('project_chart_data');

                foreach ( $project_goals_chart_data as $data_point ) {
                    $chart_labels[] = $data_point['goal_date'];
                    $projected_amounts[] = $data_point['goal_amount'];
                    $actual_amounts[]   = $data_point['actual_amount'];
                }
                
            ?>
            
            <h6>Project Funding Milestones</h6>
            <canvas id="projectGoals" width="400" height="200"></canvas>
            <script>
                var data = {
                    labels: [ "Start", <?php echo '"' . implode($chart_labels, '", "') . '"'; ?>],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [ "0", <?php echo '"' . implode($projected_amounts, '", "') . '"'; ?>]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(93,158,203, 1)",
                            strokeColor: "rgba(93,158,203,1)",
                            pointColor: "rgba(93,158,203,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(93,158,203,1)",
                            data: [ "0", <?php echo '"' . implode($actual_amounts, '", "') . '"'; ?>]
                        }
                    ]
                };
                
                var options = {
                    responsive : true,
                    bezierCurve : false,
                    scaleShowLabels: false,
                };

                var ctx = document.getElementById("projectGoals").getContext("2d");
                var projectGoals = new Chart(ctx).Line(data,options);
            </script>
            
            <div class="chart-key">
                <div class="projected-funds-raised-key"><span class="color-indicator"></span> Projected Goals</div>
                <div class="actual-funds-raised-key"><span class="color-indicator"></span> Funds Raised</div>
            </div>
		</div>
        
        <a href="#_" class="button full-width">Fund This Project</a>
		
	</div>
</div>

<?php get_footer(); ?>
