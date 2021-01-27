<div class="chat-message-list" data-simplebar>

    <ul class="list-unstyled chat-list chat-user-list">
        <?php foreach ($result as $data) {if ($data['id'] != 'status') {	?>

            <li>
                <a href="#" onclick="loadchat('<?=$data['id']?>','<?=$data['name']?>');">
                    <div class="media">

                        <div class="chat-user-img online align-self-center mr-3">
                            <img src="https://via.placeholder.com/100x100.png?text=profile" class="rounded-circle avatar-xs" alt="">
                            <span class="user-status"></span>
                        </div>

                        <div class="media-body overflow-hidden">
                            <h5 class="text-truncate font-size-15 mb-1"><?=$data['name']?></h5>
                            <p class="chat-user-message text-truncate mb-0"><?=$data['id']?></p>
                        </div>
                        <div class="font-size-11">05 min</div>
                    </div>
                </a>
            </li>
        <?php }}?>

    </ul>
</div>