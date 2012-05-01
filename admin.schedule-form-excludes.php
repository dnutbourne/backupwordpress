<fieldset class="hmbkp-edit-schedule-excludes-form">

    <legend><?php _e( 'Manage Exclude', 'hmbkp' ); ?></legend>

    <div class="hmbkp_add_exclude_rule">

    	<span class="screen-reader-text"><?php _e( 'Add New Exclude Rule', 'hmbkp' ); ?></span>

    	<input type="text" class="code" placeholder=".git/, *.mp3, wp-content/uploads/" />

    	<button type="button" class="button-secondary hmbkp_preview_exclude_rule"><?php _e( 'Preview', 'hmbkp' ); ?></button>

    </div>

    <table class="widefat fixed">

    	<thead>
    		<tr>
    			<th><?php _e( 'Exclude Rules', 'hmbkp' ); ?></th>
    		</tr>
    	</thead>

    	<tbody>

<?php foreach( $schedule->get_excludes() as $key => $exclude ) : ?>

			<tr>
			    <td data-hmbkp-exclude-rule="<?php echo $exclude; ?>">

			    	<span class="code"><?php echo str_ireplace( untrailingslashit( ABSPATH ), '', $exclude ); ?></span>

	<?php if ( $key ) { ?>

					<a href="#" class="delete-action"><?php _e( 'Remove', 'hmbkp' ); ?></a>

	<?php } ?>

				</td>
			</tr>

<?php endforeach; ?>

    	</tbody>

    </table>

    <div class="hmbkp-tabs">

    	<ul class="subsubsub">

    		<li><a href="#hmbkp_excluded_files"><?php _e( 'Excluded', 'hmbkp' ); ?></a>(<?php echo count( $schedule->get_excluded_files() ); ?>)</li>
    		<li><a href="#hmbkp_included_files"><?php _e( 'Included', 'hmbkp' ); ?></a>(<?php echo count( $schedule->get_files() ); ?>)</li>

<?php if ( $schedule->get_unreadable_files() ) { ?>
            <li><a href="#hmbkp_unreadable_files"><?php _e( 'Unreadable', 'hmbkp' ); ?></a>(<?php echo count( $schedule->get_unreadable_files() ); ?>)</li>
<?php } ?>

    	</ul>

    	<div id="hmbkp_excluded_files">

    		<?php hmbkp_file_list( $schedule, null, 'get_excluded_files' ); ?>

    	</div>

    	<div id="hmbkp_included_files">

    		<?php hmbkp_file_list( $schedule, null, 'get_files' ); ?>

    	</div>

<?php if ( $schedule->get_unreadable_files() ) { ?>

        <div id="hmbkp_unreadable_files">

            <?php hmbkp_file_list( $schedule, null, 'get_unreadable_files' ); ?>

            <p class="description"><?php _e( 'Unreadable files can\'t be backed up', 'hmbkp' ); ?></p>

        </div>

<?php } ?>

    <p><?php printf( __( 'Your site is %s. Backups will be compressed and so will be smaller.', 'hmbkp' ), '<code>' . $schedule->get_filesize( false ) . '</code>' ); ?></p>

    </div>

</fieldset>