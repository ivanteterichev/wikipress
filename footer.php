	<footer class="footer d-flex align-items-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="footer__logo col-12 d-flex justify-content-center">
					<?php if( has_custom_logo() ) : the_custom_logo(); else: ?>
        
                    <img src="<?php echo get_template_directory_uri() . '/img/logo-footer.png'; ?>" alt="Logo">
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>