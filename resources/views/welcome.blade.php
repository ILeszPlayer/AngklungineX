{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angklung</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: url("{{ asset('images/bg.png') }}") no-repeat center center fixed;
            background-size: cover;
            font-family: sans-serif;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .angklung {
            width: 85%;
            max-width: 1000px;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .row {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .note-btn {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            color: white;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
            transition: transform 0.2s, box-shadow 0.2s;
            line-height: 1.2;
        }

        .note-btn .number {
            font-size: 32px;
        }

        .note-btn .note {
            font-size: 18px;
        }

        .note-btn:active {
            transform: scale(0.9);
        }

        .blue { background: #2980B9; }
        .purple { background: #8E44AD; }
        .pink { background: #E84393; }
        .red { background: #E74C3C; }
        .orange { background: #E67E22; }
        .yellow { background: #F1C40F; }
        .green { background: #27AE60; }
        .cyan { background: #5DADE2; }

        .blue:hover   { transform: scale(1.1); box-shadow: 0 0 20px #2980B9, 0 0 40px #2980B9; }
        .purple:hover { transform: scale(1.1); box-shadow: 0 0 20px #8E44AD, 0 0 40px #8E44AD; }
        .pink:hover   { transform: scale(1.1); box-shadow: 0 0 20px #E84393, 0 0 40px #E84393; }
        .red:hover    { transform: scale(1.1); box-shadow: 0 0 20px #E74C3C, 0 0 40px #E74C3C; }
        .orange:hover { transform: scale(1.1); box-shadow: 0 0 20px #E67E22, 0 0 40px #E67E22; }
        .yellow:hover { transform: scale(1.1); box-shadow: 0 0 20px #F1C40F, 0 0 40px #F1C40F; }
        .green:hover  { transform: scale(1.1); box-shadow: 0 0 20px #27AE60, 0 0 40px #27AE60; }
        .cyan:hover   { transform: scale(1.1); box-shadow: 0 0 20px #5DADE2, 0 0 40px #5DADE2; }

        .connect-btn {
            margin-top: 15px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            background: #16a085;
            color: white;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .connect-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px #16a085;
        }

        .partitur-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            cursor: pointer;
        }

        .partitur {
            position: absolute;
            bottom: 20px;
            right: 20px;
            max-width: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.4);
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/partituroff.png') }}" id="partiturToggle" class="partitur-toggle" alt="Partitur Toggle">
        <img src="{{ asset('images/angklung.png') }}" alt="Angklung" class="angklung">

        <div class="buttons">
            <div class="row">
                <button class="note-btn blue"   onclick="playNote('5')"><span class="number">5</span><span class="note">.SOL</span></button>
                <button class="note-btn purple" onclick="playNote('6')"><span class="number">6</span><span class="note">.LA</span></button>
                <button class="note-btn pink"   onclick="playNote('7')"><span class="number">7</span><span class="note">.SI</span></button>
                <button class="note-btn red"    onclick="playNote('1')"><span class="number">1</span><span class="note">DO</span></button>
                <button class="note-btn orange" onclick="playNote('2')"><span class="number">2</span><span class="note">RE</span></button>
                <button class="note-btn yellow" onclick="playNote('3')"><span class="number">3</span><span class="note">MI</span></button>
                <button class="note-btn green"  onclick="playNote('4')"><span class="number">4</span><span class="note">FA</span></button>
            </div>
            <div class="row">
                <button class="note-btn cyan"   onclick="playNote('#')"><span class="number">4♯</span><span class="note">FIS</span></button>
                <button class="note-btn blue"   onclick="playNote('5h')"><span class="number">5</span><span class="note">SOL</span></button>
                <button class="note-btn purple" onclick="playNote('6h')"><span class="number">6</span><span class="note">LA</span></button>
                <button class="note-btn pink"   onclick="playNote('7h')"><span class="number">7</span><span class="note">SI</span></button>
                <button class="note-btn red"    onclick="playNote('A')"><span class="number">1’</span><span class="note">DO’</span></button>
                <button class="note-btn orange" onclick="playNote('B')"><span class="number">2’</span><span class="note">RE’</span></button>
                <button class="note-btn yellow" onclick="playNote('C')"><span class="number">3’</span><span class="note">MI’</span></button>
            </div>
        </div>

        <button class="connect-btn" onclick="connectArduino()">Connect Arduino</button>

        <img src="{{ asset('song/indonesiapusaka.png') }}" id="partiturImage" class="partitur" alt="Partitur Lagu">
    </div>

    <script>
        let port, writer;
        const encoder = new TextEncoder();

        async function connectArduino() {
            try {
                port = await navigator.serial.requestPort();
                await port.open({ baudRate: 9600 });
                writer = port.writable.getWriter();
                alert("Arduino connected!");
            } catch (err) {
                alert("Connection failed: " + err);
            }
        }

        async function playNote(note) {
            if (writer) {
                console.log("Mengirim nada ke Arduino:", note); // <--- Tambah log di sini
                await writer.write(encoder.encode(note + "\n"));
            } else {
                console.log("Arduino not connected, note:", note);
            }
        }

        const toggleBtn = document.getElementById("partiturToggle");
        const partiturImage = document.getElementById("partiturImage");
        let partiturOn = false;

        toggleBtn.addEventListener("click", () => {
            partiturOn = !partiturOn;
            if (partiturOn) {
                toggleBtn.src = "{{ asset('images/partituron.png') }}";
                partiturImage.style.display = "block";
            } else {
                toggleBtn.src = "{{ asset('images/partituroff.png') }}";
                partiturImage.style.display = "none";
            }
        });
    </script>
</body>
</html>
