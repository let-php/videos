
<h1 class="video-title-reproductor">{$aVideo.snippet.title}</h1>

<iframe class="video-reproductor" src="https://www.youtube.com/embed/{$aVideo.id}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<section class="video-extra">
	
	<section class="video-statics" >
		
		<span >
			<span data-jam="eye"  data-fill="#FFF" ></span>
			<span class="text-count" >{$aVideo.statistics.viewCount}</span>
		</span>
		
		<span>
			<span data-jam="heart" data-fill="#FFF" ></span>
			<span class="text-count" >{$aVideo.statistics.likeCount}</span>
		</span>
		
		<span >
			<span data-jam="star" data-fill="#FFF" ></span>
			<span class="text-count" >{$aVideo.statistics.favoriteCount}</span>
		</span>
		
		<span>
			<span data-jam="message-writing" data-fill="#FFF" ></span>
			<span class="text-count" >{$aVideo.statistics.commentCount}</span>
		</span>
		
	</section>
	
	<section class="video-share">
		<a href="https://twitter.com/intent/tweet?text={$aVideo.aShare.aTwitter.text}&url={$aVideo.aShare.aTwitter.url}" target="_blank"  > 
			<span data-jam="twitter" data-fill="#FFF" ></span> 
		</a>
		<a href="https://www.facebook.com/dialog/share?app_id={$aVideo.aShare.aFb.app_id}&display={$aVideo.aShare.aFb.display}&href={$aVideo.aShare.aFb.href}" target="_blank" > <span data-jam="facebook" data-fill="#FFF" ></span> </a>
		<a href="https://www.linkedin.com/shareArticle?mini=true&url={$aVideo.aShare.aLn.url}&title={$aVideo.aShare.aLn.title}"  target="_blank" > <span data-jam="linkedin" data-fill="#FFF" ></span>  </a>
		
	</section>
	
</section>