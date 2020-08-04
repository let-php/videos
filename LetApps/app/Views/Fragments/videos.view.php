{each values=$aVideos value=video}
	<a href="{$video.link}" class="video-items {if $mCodeVideo == $video.id}video-active{/if}" style="order: {$video.position}" >
		<section class="media-left" >
			<img src="{$video.image}" width="{$video.image_width}" />
		</section>
		
		<section class="media-content">
			<h6 class="video-title">{$video.title}</h6>
			<p>{$video.description}</p>
		</section>
		
		<section class="media-right">
			{if $mCodeVideo == $video.id}
			<i data-jam="play-circle" data-fill="#FFF" data-height="24" ></i>
			{else}
			<i data-jam="chevron-right" data-fill="#212121" data-height="24" ></i>
			{/if}
		</section>
		
	</a>
{/each}