<?php 
/**
 * Template: eael Social Feed List Template
 */
?>
<div class="eael-social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}">
    <div class='eael-content'>
        <a class="eael-author-img" href="{{=it.author_link}}" target="_blank">
            <img class="media-object" src="{{=it.author_picture}}">
        </a>
        <div class="media-body">
            <p>
                <i class="fa fa-{{=it.social_network}} eael-social-icon"></i>
                <span class="eael-social-author-title"><a href="{{=it.author_link}}" target="_blank">{{=it.author_name}}</a></span>
                <span class="muted eael-social-date"><a href="{{=it.link}}" target="_blank">{{=it.time_ago}}</a></span>  
            </p>
            <div class='text-wrapper'>
                <p class="eael-social-feed-text">{{=it.text}} <a href="{{=it.link}}" target="_blank" class="eael-read-button">read more</a></p>
            </div>
        </div>
    </div>
    {{=it.attachment}}
</div>