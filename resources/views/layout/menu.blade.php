<div class="col-md-3" id="menu1">
    <div class="clock">
        <div class="hour">
            <div class="hr" id="hr"></div>
        </div>
        <div class="min">
            <div class="mn" id="mn"></div>
        </div>
        <div class="sec">
            <div class="sc" id="sc"></div>
        </div>
    </div>
    <div id="digitalClock">
        <div id="hour"></div>
        <div id="minutes"></div>
        <div id="seconds"></div>
        <div id="ampm"></div>
    </div>
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active" style="font-weight: bold;">
            MENU
        </li>
        @foreach ($theloai as $item)
            @if (count($item->loaitin) != 0)
                <a href="theloai/{{ $item->id }}/{{ $item->TenKhongDau }}.html"><li class="list-group-item menu1">
                    {{ $item->Ten }}
                    <ul class="sub-menu">
                        @foreach ($item->loaitin as $item1)
                        <li class="list-group-item1">
                            <a href="loaitin/{{ $item1->id }}/{{ $item1->TenKhongDau }}.html">{{ $item1->Ten }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li></a>
                
            @endif
        @endforeach

    </ul>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .clock {
            width: 200px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin:29px 29px 5px 29px;
            background: url('upload/clock.png');
            background-size: cover;
            background-color: #091921;
            border: 4px solid #091921;
            border-radius: 50%;
            box-shadow: 0 -15px 15px rgba(255,255,255,0.05),
                        inset 0 -15px 15px rgba(255,255,255,0.05),
                        0 15px 15px rgba(0,0,0,0.3),
                        inset 0 15px 15px rgba(0,0,0,0.3);
        }
        .clock:before
        {
            content: '';
            position: absolute;
            width: 9px;
            height: 9px;
            background: #fff;
            border-radius: 50%;
            z-index: 10000;
        }
        .clock .hour,
        .clock .min,
        .clock .sec {
            position: absolute;
        }

        .clock .hour, .hr {
            width: 90px;
            height: 90px;
        }
        .clock .min, .mn {
            width: 110px;
            height: 110px;
        }
        .clock .sec, .sc {
            width: 130px;
            height: 130px;
        }
        .hr .mn .sc {
            display: flex;
            justify-content: center;
            /* align-items: center; */
            position: absolute;
            border-radius: 50%;
        }
        .hr:before {
            content: '';
            position: absolute;
            width: 5px;
            height: 50px;
            background: #ff105e;
            z-index: 10;
            border-radius: 6px 6px 0 0;
            margin: -2px 0px 0px 42.9px;
        }
        .mn:before {
            content: '';
            position: absolute;
            width: 3px;
            height: 60px;
            background: #ff105e;
            z-index: 10;
            border-radius: 6px 6px 0 0;
            margin: -2px 0px 0px 54px;
        }
        .sc:before {
            content: '';
            position: absolute;
            width: 1px;
            height: 85px;
            background: #fff;
            z-index: 10;
            border-radius: 6px 6px 0 0;
            margin: -2px 0px 0px 65px;
        }

        #digitalClock {
            display: flex;
            color: black;
            font-size: 2em;
            justify-content: center;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }
    </style>
    <script type="text/javascript">
        const deg = 6;
        const hr = document.querySelector('#hr');
        const mn = document.querySelector('#mn');
        const sc = document.querySelector('#sc');

        setInterval(() => {
            let day = new Date();
            let hh = day.getHours() * 30;
            let mm = day.getMinutes() * deg;
            let ss = day.getSeconds() * deg;

            hr.style.transform = `rotateZ(${(hh)+(mm/12)}deg)`;
            mn.style.transform = `rotateZ(${mm}deg)`;
            sc.style.transform = `rotateZ(${ss}deg)`;

            let hour = document.querySelector("#hour");
            let minutes = document.querySelector("#minutes");
            let seconds = document.querySelector("#seconds");
            let ampm = document.querySelector("#ampm");

            let h = new Date().getHours();
            let m = new Date().getMinutes();
            let s = new Date().getSeconds();
            let am = "AM";

            if (h > 12)
            {
                h = h - 12;
                am = "PM";
            }

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            hour.innerHTML = h+":";
            minutes.innerHTML = m+":";
            seconds.innerHTML = s +"&nbsp";
            ampm.innerHTML = am;
        })
    </script>
</div>
