
<style>
    .gooey {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 142px;
        height: 40px;
        margin: -20px 0 0 -71px;
        background: #fff;
        filter: contrast(1);
    }
    .gooey .dot {
        position: absolute;
        width: 10px;
        height: 10px;
        top: 12px;
        left: 15px;
        filter: blur(1px);
        background: #1563b8;
        border-radius: 50%;
        transform: translateX(0);
        animation: dot 2.8s infinite;
    }
    .gooey .dots {
        transform: translateX(0);
        margin-top: 12px;
        margin-left: 31px;
        animation: dots 2.8s infinite;
    }
    .gooey .dots span {
        display: block;
        float: left;
        width: 10px;
        height: 10px;
        margin-left: 16px;
        filter: blur(1px);
        background: #1563b8;
        border-radius: 50%;
    }
    @-moz-keyframes dot {
        50% {
            transform: translateX(96px);
        }
    }
    @-webkit-keyframes dot {
        50% {
            transform: translateX(96px);
        }
    }
    @-o-keyframes dot {
        50% {
            transform: translateX(96px);
        }
    }
    @keyframes dot {
        50% {
            transform: translateX(96px);
        }
    }
    @-moz-keyframes dots {
        50% {
            transform: translateX(-31px);
        }
    }
    @-webkit-keyframes dots {
        50% {
            transform: translateX(-31px);
        }
    }
    @-o-keyframes dots {
        50% {
            transform: translateX(-31px);
        }
    }
    @keyframes dots {
        50% {
            transform: translateX(-31px);
        }
    }

</style>
<div id="custompreloader" style="background-color: #fff !important;">
    <img src="{{ asset('images/logabaru.png') }}" alt="" style="top: 50%;width: 240px;left: 50%;position: absolute;z-index: 1;margin: -47px 0 0 -120px;">
</div>