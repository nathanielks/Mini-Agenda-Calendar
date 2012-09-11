<div class="span4">
	<div class="widget-well">
		<div class="calendar-head widget-header">
			<a id="<?php echo $pagination_links[1]['id']; ?>"
				class="load-view prev"
				href="<?php echo esc_attr( $pagination_links[1]['href'] ); ?>&amp;ai1ec_post_ids=<?php echo $post_ids; ?>">
				<i class="icon-chevron-left"></i>
			</a>
			<a href="#" class="calendar-title widget-title"><?php echo esc_html( $title ); ?></a>
			<a id="<?php echo $pagination_links[2]['id']; ?>"
				class="load-view next"
				href="<?php echo esc_attr( $pagination_links[2]['href'] ); ?>&amp;ai1ec_post_ids=<?php echo $post_ids; ?>">
				<i class="icon-chevron-right"></i>
			</a>
		</div>
		<div class="weekdays clearfix">
			<?php foreach( $weekdays as $weekday ): ?>

				<span class="weekday"><?php echo $weekday[0]; ?></span>
			<?php endforeach; // weekday ?>
		</div>
		<table class="month-view">
			<tbody>
				<?php foreach( $cell_array as $week ): ?>
					<tr class="week">
						<?php foreach( $week as $day ): ?>
							<?php if( $day['date'] ): ?>
								<td <?php if( $day['today'] ) echo 'class="today"' ?>>

					  <?php
						// TODO: This div should not be needed, but with multi-day
						// event bars it is required until a better method of arranging
						// events is contrived:
					  if( ! isset( $week['added_stretcher'] ) ): ?>
						<div class="day-stretcher"></div>
						<?php $week['added_stretcher'] = TRUE; ?>
					  <?php endif; ?>

									<?php $has_events = ( $day['events'] ) ? 'has-events' : ''; ?>
									<div class="day <?php echo $has_events; ?>">
											<?php if ( $day['events'] ){ ?> 
												<a href="#<?php echo sanitize_title($day['date'] . ' ' . $title); ?>" class="date"><?php echo $day['date'] ?></a>
											<?php } else { ?>
												<div class="date"><?php echo $day['date'] ?></div>
											<?php } ?>
									</div>
								</td>
							<?php else: ?>
								<td class="empty"></td>
							<?php endif // date ?>
						<?php endforeach // day ?>
					</tr>
				<?php endforeach // week ?>
			</tbody>
		</table>
	</div><!-- /.widget-well -->
</div><!-- /.span4 -->
<div id="agenda-view" class="span8">

<?php 
$i = 0;						  
foreach( $cell_array as $week ):
foreach( $week as $day ): 
if ( $day['events'] ) :
	$date_title = $day['date'] . ' ' . $title;
?>

	<div id="<?php echo sanitize_title($date_title); ?>" class="agenda-container <?php if ($i == 0) echo 'show-icon'; elseif ( $i > 4 ) //echo 'hide'; ?>">
		<i class="icon-caret-left"></i>
		<div class="event-date"><?php echo $date_title; ?></div>
		<ul class="events">

<?php foreach ( $day['events'] as $event ): ?>
			<li class="event <?php if ( $i > 4 ) //echo 'hide'; ?>">
				<h4 class="event-title"><?php echo esc_html( apply_filters( 'the_title', $event->post->post_title ) ) ?></h4>
				<div class="event-meta">
					<?php if( ! $event->allday ) { ?>
						<div class="event-time">
							<?php echo esc_html( $event->short_start_time ) ?>
						</div>
					<?php } else { ?>
						<div class="event-time">
							<?php esc_html_e( '(all-day)', AI1EC_PLUGIN_NAME ) ?>
						</div>
					<?php } ?>
					<?php if ( $show_location_in_title && isset( $event->venue ) && $event->venue != '' ): ?>
						<div class="event-location"><?php echo esc_html( sprintf( __( '%s', AI1EC_PLUGIN_NAME ), $event->venue ) ); ?> </div>
					<?php endif; ?>
				</div>
				<div class="event-content">
					<?php echo apply_filters( 'the_content', $event->post->post_content ); ?></span>
				</div>
			</li>
<?php $i++; endforeach; // events ?>

		</ul>
</div>

<?php endif; endforeach; // week as day ?>
<?php endforeach; // cell_array as week ?>

</div><!-- /.span8 -->
