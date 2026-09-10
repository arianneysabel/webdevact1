<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        html, body {
            margin: 0;
            height: 100%;
            font-family: 'Inter', sans-serif;
        }
        body {
            min-height: 100vh;

            background:
                repeating-linear-gradient(
                    0deg,
                    rgba(208, 231, 255, 0.045) 0px,
                    rgba(208, 231, 255, 0.045) 1px,
                    transparent 1px,
                    transparent 44px
                ),

                repeating-linear-gradient(
                    90deg,
                    rgba(208, 231, 255, 0.045) 0px,
                    rgba(208, 231, 255, 0.045) 1px,
                    transparent 1px,
                    transparent 44px
                ),

                #123e5b;

            position: relative;
            overflow-x: hidden;

            display: flex;
            flex-direction: column;
        }

        /* Background Decorations */

        .bg-decor {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(70px);
        }

        .orb.o1 {
            width: 480px;
            height: 480px;
            top: -160px;
            left: -140px;

            background: radial-gradient(
                circle,
                rgba(79, 157, 194, 0.5),
                transparent 70%
            );

            animation: drift1 22s ease-in-out infinite alternate;
        }

        .orb.o2 {
            width: 420px;
            height: 420px;
            bottom: -180px;
            right: -140px;

            background: radial-gradient(
                circle,
                rgba(160, 196, 255, 0.35),
                transparent 70%
            );

            animation: drift2 26s ease-in-out infinite alternate;
        }

        .orb.o3 {
            width: 300px;
            height: 300px;
            top: 45%;
            left: 55%;

            background: radial-gradient(
                circle,
                rgba(185, 224, 255, 0.22),
                transparent 70%
            );

            animation: drift3 30s ease-in-out infinite alternate;
        }

        @keyframes drift1 {
            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(60px, 40px) scale(1.08);
            }
        }

        @keyframes drift2 {
            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(-50px, -30px) scale(1.06);
            }
        }

        @keyframes drift3 {
            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(-40px, 50px) scale(0.94);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .orb {
                animation: none;
            }
        }

        /* Header */

        header {
            position: relative;
            z-index: 1;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 18px 32px;

            background: rgba(18, 62, 91, 0.55);

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            border-bottom: 1px solid rgba(160, 196, 255, 0.2);
        }

        header .brand {
            font-size: 18px;
            font-weight: 700;
            color: #f0f8ff;
            letter-spacing: 0.01em;
        }

        header .user {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        header .avatar {
            width: 32px;
            height: 32px;

            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #a0c4ff,
                #4f9dc2
            );

            border: 1px solid rgba(240, 248, 255, 0.3);
        }

        header .username {
            font-size: 14px;
            color: #d0e7ff;
        }

        /* Logout Button */

        header .logout {
            display: flex;
            align-items: center;
            gap: 6px;

            padding: 7px 14px;

            font-family: inherit;
            font-size: 13px;
            font-weight: 600;

            color: #d0e7ff;

            background: rgba(240, 248, 255, 0.06);

            border: 1px solid rgba(138, 184, 255, 0.35);

            border-radius: 7px;

            cursor: pointer;

            transition:
                background 0.15s ease,
                border-color 0.15s ease,
                color 0.15s ease;
        }

        header .logout svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
        }

        header .logout:hover {
            background: rgba(240, 248, 255, 0.12);
            border-color: #a0c4ff;
            color: #f0f8ff;
        }

        header .logout:focus-visible {
            outline: 2px solid #a0c4ff;
            outline-offset: 2px;
        }

        /* Main Content */

        main {
            position: relative;
            z-index: 1;

            flex: 1;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px 24px;
        }

        main .placeholder {
            color: rgba(208, 231, 255, 0.5);
            font-size: 14px;
            text-align: center;
        }

    </style>

</head>

<body>

    <!-- Background Decorations -->

    <div class="bg-decor">

        <span class="orb o1"></span>
        <span class="orb o2"></span>
        <span class="orb o3"></span>

    </div>


    <!-- Header -->

    <header>

        <div class="brand">
            Dashboard
        </div>


        <div class="user">

            <!-- Display Logged-in User's Name -->

            <span class="username">
                {{ Auth::user()->name }}
            </span>


            <span class="avatar"></span>


            <!-- Logout -->

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="logout" type="submit">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>

                        <polyline points="16 17 21 12 16 7"></polyline>

                        <line
                            x1="21"
                            y1="12"
                            x2="9"
                            y2="12"
                        ></line>

                    </svg>

                    Log out

                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <p class="placeholder">
            Welcome to your dashboard, {{ Auth::user()->name }}!
        </p>

    </main>

</body>

</html>