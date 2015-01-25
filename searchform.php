<form method="get" id="header-search-form" action="<?php echo home_url('/'); ?>">
    <fieldset>
			<input type="text" name="s" id="header-search" value="<?php the_search_query(); ?>" placeholder="Search" />
			<button type="submit" class="submit-search"><i class="fa fa-search"></i></button>
	</fieldset>
</form>
