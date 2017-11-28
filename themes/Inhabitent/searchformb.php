




<form role="search" method="get" class="search-form-404" action="<?php echo home_url( '/' ); ?>">
	<div>
		<label>
			<input type="search" class="search-field-404" placeholder="SEARCH ..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Search for:" />
		</label>
		<button class="search-submit-404">
			<?php echo esc_html( 'Search' ); ?>
		</button>
	</div>
</form>
