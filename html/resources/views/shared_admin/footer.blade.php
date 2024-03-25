<div class="popup-wraper">
    <div class="popup">
        <span class="popup-closed"><i class="icofont-close"></i></span>
        <div class="popup-meta">
            <div class="popup-head">
                <h5><i class="icofont-envelope"></i> Send Message</h5>
            </div>
            <div class="send-message">
                <form method="post" class="c-form">
                    @csrf
                    <input type="text" placeholder="Enter Name..">
                    <input type="text" placeholder="Subject">
                    <textarea placeholder="Write Message"></textarea>
                    <div class="uploadimage">
                        <i class="icofont-file-jpg"></i>
                        <label class="fileContainer">
                            <input type="file" accept="image/jpg, image/png, image/jpeg">Attach file
                        </label>
                    </div>
                    <button type="submit" class="main-btn">Send</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- send message popup -->

<div class="side-slide">
    <span class="popup-closed"><i class="icofont-close"></i></span>
    <div class="slide-meta">
        <ul class="nav nav-tabs slide-btns">
             <li class="nav-item"><a class="active" href="#messages" data-toggle="tab">Messages</a></li>
             <li class="nav-item"><a class="" href="#notifications" data-toggle="tab">Notifications</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active fade show" id="messages" >
                <h4><i class="icofont-envelope"></i> messages</h4>
                <a href="#" class="send-mesg" title="New Message" data-toggle="tooltip"><i class="icofont-edit"></i></a>
                {{-- <ul class="new-messages">
                    <li>
                        <figure><img src="images/resources/user1.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Ibrahim Ahmed</span>
                            <a href="#" title="">Helo dear i wanna talk to you</a>
                        </div>
                    </li>
                    <li>
                        <figure><img src="images/resources/user2.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Fatima J.</span>
                            <a href="#" title="">Helo dear i wanna talk to you</a>
                        </div>
                    </li>
                    <li>
                        <figure><img src="images/resources/user3.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Fawad Ahmed</span>
                            <a href="#" title="">Helo dear i wanna talk to you</a>
                        </div>
                    </li>
                    <li>
                        <figure><img src="images/resources/user4.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Saim Turan</span>
                            <a href="#" title="">Helo dear i wanna talk to you</a>
                        </div>
                    </li>
                    <li>
                        <figure><img src="images/resources/user5.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Alis wells</span>
                            <a href="#" title="">Helo dear i wanna talk to you</a>
                        </div>
                    </li>
                </ul> --}}
                <a href="#" title="" class="main-btn" data-ripple="">view all</a>
            </div>
            <div class="tab-pane fade" id="notifications" >
                <h4><i class="icofont-bell-alt"></i> notifications</h4>
                {{-- <ul class="notificationz">
                    <li>
                        <figure><img src="images/resources/user5.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Alis wells</span>
                            <a href="#" title="">recommend your post</a>
                        </div>
                    </li>
                    <li>
                        <figure><img src="images/resources/user4.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Alis wells</span>
                            <a href="#" title="">share your post <strong>a good time today!</strong></a>
                        </div>
                    </li>
                    <li>
                        <figure><img src="images/resources/user2.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Alis wells</span>
                            <a href="#" title="">recommend your post</a>
                        </div>
                    </li>
                    <li>
                        <figure><img src="images/resources/user1.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Alis wells</span>
                            <a href="#" title="">share your post <strong>a good time today!</strong></a>
                        </div>
                    </li>
                    <li>
                        <figure><img src="images/resources/user3.jpg" alt=""></figure>
                        <div class="mesg-info">
                            <span>Alis wells</span>
                            <a href="#" title="">recommend your post</a>
                        </div>
                    </li>
                </ul> --}}
                <a href="#" title="" class="main-btn" data-ripple="">view all</a>
            </div>
        </div>
    </div>
</div><!-- side slide message & popup -->