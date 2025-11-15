<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Market Insights</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .chart-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }
        .chart-box {
            flex: 1;
            padding: 0 10px;
            text-align: center;
        }
        .chart-box img {
            width: 100%;
            height: auto;
            max-width: 300px;
            margin: 0 auto;
            display: inline-block;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<header>
    <h1>Indian Finance Dashboard</h1>
    <nav>
        <a href="logout.php" class="logout-btn">Logout</a>
    </nav>
</header>

<main>
    <h2>Stock Market Insights</h2>
    <p>Indian stock markets have surged to new highs this quarter, reaching historic records.</p>

    <!-- Row containing charts -->
    <div class="chart-row">
        <!-- Nifty50 Chart -->
        <div class="chart-box">
            <h4>Nifty50 Performance</h4>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPgAAADLCAMAAAB04a46AAAB+FBMVEUYGBgYFxYYFxcXFxcUFBQcJCseHh4QEBBBQUFXV1cAAAAZGx0bISZHR0ccIyqMwXYICAhbml24LAxen2AAAAd7e3vnYV0AEhUVERX///8sLCwqOyohKyEmJibrYl6HrHhnZ2elSjwOBA4/Pz/LRTeIxXgQABA3NzcPGiJ4sWwADg9xcXEwSjGdRUJRUVFFVEVPhFFAaEGSbT48IiFNIyWOjo67JADEYkiey4zGVFFHdUkAABi6iWBra2tWkVgeJR6WYDW9NBytqHE2KzGHPTofLjh8qGZlRkV2qniHh4fn5+fSWVWYQ0B1NjQAHSJZakFkhWNYaUBofUuYkAunQDlHVDU1UzZviXASFyQpOyofHxiZmZmyWFDBwcE1HxBsgk0gPioXJBcAKh6rq6uoXFinhGlXQTETL06DdmEAJTqJgHYnOEljWFRSWWaBiY1uZFcVHj4AAB85LR5AFgA9T14mEQBhcnxsVzpsY01QMR1IJAQAFzJKQTQvOkRsOz/OZmOqbWyQdHNPLDNWISeIkH9+HCRqHCIwGSDXmWt5RTOMj1pTHhy7MzjpR0p/LSqLd09nDhhld2YAHhaFWliIm2/GvAwAACyrpiRzcy9bXi6ZlDN+dxJBPhVQTBGudlW5mGekl3SNaU+auI3b4O+5xM3e3tDQwbD07eMaymazAAAdnElEQVR4nO2djUPb5p3HZT2PJctgIoKFNdmiOrmxiR1UGJArMOPrJdzqEiA4gUBIlqZ03dIuzdrrst11Sdv1Zbvmdtu67i279a7Xl/2b9/s9kmzZkmwZOwkk/YJtSc+Lno+eFz2vEscFKRaPBR4PVVQHPXvcED88HNXp0DAfbECEBO3s9BvwYPekRwe92/Pr4YBzHbl13UceDkQpgT/456j/ejkeUkIcC/AXYhGOUXbNAy57m6KDx2SZxuSYzIkiFdPwLcpiEo6JHB6VYY+DjwibMp4/lfddtyBwIoJtWiySvJYv6nmxKIDjoVY7IqVwIfOCXtSKYp5QnWpgUSMtVkT4pnCx8yLRNaIL3cgjg8dMRXnlBz+88WpSMl770QfwffNV4/VXKzduyXBUUW4qt5K3yzd/+uPK66++CZdcixTjRKtUBAA3LEnLG0aqaEmiD1wqpgDcsqRiUZJSklaWNStlaJ7giYYmEU7MV5JSKmVZZc1IdUuu0cELNeOV28ZK7RXj9qtvvH7LqNy89ebtf31r/idyxbjxqnKzAuC3APxnb70CYaf5YpQYFwFK0qkuAbGWKBqS7gMnVClbRUotq2KIkiZVymVOljjLEL3eVPIa1ctlMW+Uy4YE12dw4EvlH7+qvP6jW+VK+faZW7dfvX3z38Tb//72LXmnBkeTN2/+LHn7e6/99Ac/e+vn4JC2JsUwcIzxvC5aRt5ISLJl2FHVHuOaVRSLRkqSDIjZIrWKwClJHnDCKRqcT7CKmqHrKUgbXQuo6HlcNcqpN5ekn9+4ZaUl641bqdT3xLe+t2OJd/ConLoMAf9J+nY5dudNEhkc8zgUU1hsQC5lP1xAHoejaEFkFghuwX+LN+gLeEbYv4ilwsDAOSjAaAz/RR7KMPAbSiUSE6FIjmHAiMh2ZWKXtwGlbuTb1FB3K32r59uZWigUnM0Ql6EKjnGMOTvGRYi3oBhn4WDxLdrR7vfadodmhH0oFd0UElK89wqubo8uL9vkfLxH8qA8TgzIqyJmbiix5bJWKfrzeAoSLhT8qQrkcigEDMtHTlOVosgRybAMwZIqspRPYLFhWUai4s9yTD2Dz4yNjhY4vG0OosoqWgkZuDRDMlIy3qqMlK9U5wywwlEpZUiWJAlQxPnARSNZSVACPkDpJyVSUPwlLbhDJOHPf1tl6g2cIvjYaIEWIZ4GAU4TlQTcqhIS3KXLCUvJ++/jhCipIiWaBVRFRE8YPhQRLhzYKWN5L8A1hBqBVUlIUsWSjL7ASzGUahZNdXfm0rYKt0sxBhw9qsWBfV6qQU2HaJqocfBFBI331dwIsyJoRBN0sBdUNSJCkeg8+KBrHBV0URR4XRM0dsCtw7WFZWg4JJA8gLvb3N04aGR3eXl5ZGRH2YlPpoz1eHwl3qNaHXBDTJzzcb9Bw0PB4trseY3avzmvz8zTyMFMjTSCuIBRrp4aGx2jvFyWS1MTE3BoEDEepL5aZ6HeHijGF0rgkoGrPGT0zBUHvLdgHcFmaQs4x2XWrrx8NtMMX9c2oK2HC04zmU7VtwOBc6W8UWqGj4QUnO16eOBwt6Vza2tzHcgPBk4EYG2ET1aixflDA1eLlllanZiYyoRbPRg46+FohC9ZznQ4Q1MPC1w9NXN+O70wPj4QcJEC+JgL3gwf4TJT7yysRSF/WODm4tjY9KDAS5JWUgtnCh7bGD6eCrS0Oj5x7pCBjw4M/OzLUxCrLVkZwsdz15XrAD7++IKfe+dKe3KG8LHUn7bBAxqLnM9BlNAfJvA5KhvFkj98rLyzwUsp1zy0a/cIglNo//g6D1vAS7PvzQm2Qy2kBXwUwbmu4PLExISdF0QpoKNAdRxECv7RAYeqgjwxHg5Os1sFU3104EEVuD7ASZww8NLau2fnSjY4DQTnua36xpaqPlTwZs2NBvUl9RPjI3aMq1Bzow64RgOTOq+a1a361o4aKfiDAbdvwChZkTn7ptNAoOTA4GQWcvUcAydQqtngApzCA+51wauFrfqpQtf+bm5A4AXZ0Eo2L4KLGCi5LNuhKlVK0cBjMbid0Zb2Op0FVBuch10HvCzHTCtlOlZSrU7Unc16Tu21w6InDQ/Blw0upnQakysyhF2RY0klqbINDBWde29uNlJHRDw+WcmPtHbQnAHUXyA4O76O4JMj5Z2RU+fPnxqJ48FJZbKt62knDum91y6qnrWD4DvxkREnCPC1s7w8emrE3VuH/H9uPdS9p+spYoy/uH3plDkNLYQC1cEGXOX2mOQhvRe6Rnr/MQ5BYPssjuHLhHBuq7inQqhYJXs9xIuWGA/O4w1wzsnjcMLl9PQoZjAF0tPFd1pvpCzvqtVr2S5lXN/N0pnp6RmTHWDlGnwVXPBmJXv94IVbC/jq6ur7M2OjDHwRwTNnwUJLNdcGourGltkx+H13RJhFyT4DD9HLYRzb4JjRG1WuqOCVzuBc0kimZyDGMZ0tmjb4RBA4RwpdyPsGp3l7sIXPzVzaNreXl6fTEM+nuO1L20Kv4DTV1rHWDg43DnV7enrRxFKdSyoFdXbt3TV/Ukd1IR8YON2dfn7aZINeGNm56enpXK/gvmFfHziHI6mQxPA+rs6cXzyllqTWBl0TqLC5VeBCNTBwjqalNIIvFzCz84VCoeek7jcPAOeIaFdZC8tjY1C8tNXgPECFzc3wOB8cOEuHDXBUA/zsQMHZqRj46NiMj8wLZG6El+39dy8LnklP9jCn2wVudxwmK6XMQee5hYLjDLfu4FwBKnEhXg9gQMGTL/kslGmqe4SVdyonRq6r+83DwLEHJgI4Ua+pfXZY+BU4hMTuab69BwAOigAObYW6GXzuQY+dkZbZfs7eowPn1Gw9uGjvDzwgGZGAvX7AoVmamzk/E2AtEjhnbm0GkvcFrqoBEREgB5z4+g66TuLl7713j6ct+aehaOBAHliR6QscSrJqFHIbnAi+XpPus5dZs969P7YqAJyWSiUfEFThAor2vsCxbhqlowfAcUqgXm4Pf8T56mHgYw1wO0vRufHx8TM+HwtBt/N+wAUodCKCx3D+dxPcLQhawPkgYfOaB/AAI5rd3a3aljiN4m9pDsrCM9Rn06xX1UCPD6QYxDiCR7A5NAwplqdC2Qk/1UTHBMBdW9xIkIZXhkdGJsuTgYZgbH9rCrMQ/wWCD/ut7VzT2n1gHoepgxGeJo7g4cbrTHb3yqSyM/mLtd+/v8NU/SCr21sjqcY5gqYZDQ1xbN4SDZmh5Eovi/iTYTEeZEGtZ80gj4PFCeFmYOrEeJj5vQ+ZPvroo3u/nCx9cGrr+7/61Xfq9frGRr1+aXOjDn+gVIMpOJfYWbFLdrQzkcjZ4EGlBm9utDXVOuVxuUw7lNnd8jjJoPhfzr5/7z8+++w7H2+fmxhfTZumWdgFd9WCaaqqqQ5kFRIDFy0xHBxai1ubpreO0RFc6TQqG6lwI6qZrW9sTZ66dO+3//nridVSJkNUBM8501wGBw4lYAdwuJ9nr6mewHbyOKmUOgQrAjiv0q36Jm+qw1AFyZwb//WvIenPZl6E2+BAwTPr5WRXcE7NXcs2b/ttHmMUswoWpVzm7Lvnwucyke7gqrkJZQo0j6BUh1BNjY+vlvh7H334X5/95tqbmA8GBJ5ZW3hnKtMVnKOFzc20m9xbPRYlkaNDVoktc+k47YTosS7gfCFbzxaYsQccs/6LY9c+/ujD3354j88MDQSc+ZxW0qXO4Cy5V9UgjyF8ZPbue3MUO/M6TjtJK8mO4Lxa3dg0HUMPOBEEyONjYy+tQRh/++GHgwO/rlwn3cA5ldSd5N7qMQ4ATE1MrKYXR0cX02HglHA8nMa5nQWfQN3cuNzIUB5wUUqJOJknswa1y9IgYxzrz13Bm/e11p6a6eXlF9GX9PTYWCi4mtLVwujY2PZQGDjFVO7pAIC6ukBccGipQHKxwQeUx23w0SjgALlVL5B2cBwKsMHDY5zu/u6ZLPat7ITFuJqrbxW8x1kjxQ4e6xAnOnlA4Kurq93AIaPXL6sHADfBbAZHiIaHl5eXd/2ngUt6ufVysGZp5uzq6kJ6+/x51in3YMBFiI/uDiBismZncCjVM74ppGnjjInF4PAQnMYXbmJubhbaembs9jjebdXt84vbeFWCwKGhgh8CycPZhLZLnGe/7q7zYT/EMSk1wNW0Isep6wXf5qaxq6ah4B2JNc/VBo7TR3+5trZWavUCB3P5NIITXeXbgqtycDVp67lUAEcjbJ1hUkeLNrg6lFJdixyf3aVCNker2SrNZQW6m4XN3EgOdrNZnsuyXWYCm5fZJlrkeFYsvcTAd2vJ+G4uyGI2yzW9qBa2rsVJw0QoQMm4PQVV6pdwGNaUf/dSCUcjX8pebjlXuUiz15XL2apqu3OCi6Zq9lpWrfrONZwDL3azZTGbk6RdDC4D/2T3mQ92Ha5djuSgOper8pdzl/lqjuNhV8hVR6o5AXYdkyqPu47FqmPxJQT/hIFfh6TOTKoeL1yL6EZwvKhCcq82TMyZmcXdu1Mvn/2EjT+DRTt8thewSz956RNalTSaq+ZjOd0bChbc6tZmtel5zj4XBHfY3i2LuapkMVPmcXpx7PnlyxgKwuWwMuhJ0LBJcDduJ2q260lGXouepA45MO7zggvwgtCdzY0CdXeh7URLkBULbMYBWLRTpHsuOruwsCAQEdwTir2szItGKAhknULQuTCp44pz7IgQBGbKBrbTMwBecLwILoh6K9wYeNTpXibW3T3jDURXZHNmeZl1Z9ngrhGdm5iYmHXHSdr71alZ9zQCvHI6G1mr2ZmEmrm7+s6CC+4E5aAzNlpiPOk4ELu5isdUc2Mjexni2p2TUaSNWUU2eNOrWWW24ZJNBWlKvXwtbLaRvQoJY9wT2qSRNBm4e9oDz9FZPwfg66w7aFKZtB2MSCOdHTGPd+JbG/V6bmfHtjyC7ix7nhGC291HOxIY++YYNTSi1eNdzrVSaXE8Gd9BcHeC0mBjnE3I6Shmj1fVpAFN56rJZhdB7ELNEn/dGBf52OL5xSz1+tcS41AdKrTOWPLIXXfWnvxaYzwkKx4sjwf3SAd4XIByfDu3sbHFmWyRtDNz0AanQ1KJcz12XbbkcdOuAIcobAjJbMnjHcPXSc1GiipWoAJTKpGo4O6Yq2pCms+ZptoKPnf23bVMB3Bs4RdCimXUQwHHKRgQY7H43O/vzpJo4KQ5yq6a6mZ9YzNnpWR7uR+U4zK2VDPsigaCm9Ao6TjD6KGAuw7WF3BGMdSmOy9Tc4domgNRRDW53Oa1a1uY4eFKKGIGK3OlmUszOT4AHKJ7g+vc5RgGzhNNETsPvh0EfHx8Cmd5z3Yk94NzWK2B29kpiPnLJsZxZg0qc3gNeU5sLqR3F9xVoRrQZQ1g6DAx1aOWQZ0UAC6PT0yc7bhoKTYS45DJOwLH4dMFUqoKSXgjaw5RruT0YnKcZ44RAyfQBlW7Dp+Fj49rDwx8fLwzOE3RzN2J8fGMqqotc+1wh5oq3OMEU3X6rVtcAjhRq/WtDqW5q8ME7kBiT0oG+/0y2LgNCJlqZjfqWaESAD65w/u6HIIVDq5XBgI+4QGPJ42VUikM3J5Gz/HC9qXtT+CWNRGeLFSM9k9zZlJJQ6owUey7gEtAOt3EmnrAD7LLnF1oTmGOxbG/IBzcjj4+BzepFzuDY1exam3WNz/Ibm1t2kN9UMGt15/ZMaMt/3jgT/BjIykNBx5w/xBYE3y0OzgOrqhm9dJWNidApBPsPYYon3z0T/BzvfHMtfCCi5KPvEdwVFpJqmySLU+w/XwoHl3oehMCHlB9OwC4XPaV6ocGXGhGbWfwjDOBygGfiALe/qSCQwTunUjWAJ8IAM+srb7DHkzAwHfnpl7utEAyRIcJvMUBTWgkcxEfMOAHPzuBHUrUAReDJ9B10cDBO/QX9KJ4jNIYLgEr+XsjMmexqkMTlDJwtXt3RZDaup46KNoDcMJ7iHqS7WDSmAxYk7aO4OtweISBj4R3KD1wtaw7C9JBH3mEvT0hMQ6HD1WMB6qvRx4F5HEH3M7jtP1OFUmHtnDrAZxEfZCSV0cXHFdJVRcXF3P8QbiPLPh4evH84q5q7oQsXeiqIwDOOo28ggrM6kKSrYQc9NKMQD0qcGhz59rIG0tAH2Nwnptenm6fqd5Y9PsYg7PupfYeAwY+9piDBw2nYOVlV9mt8k8gOJdW0vzA150F6pGB+ytm2CnDrsdjDU4CnvWPS5GNgzzbuKEjAB5WMRMP4nFDRwG8VTSivS46cuC05QEUhwg8eOlWr8vDwh20rl7rZ93ZUESn2B4PMfGuOxsO1Erw4XCFOlhSlvryuKF4PKrNkVCb8VRjM2SpV7zDCrBeHKinRkdH+/K4oeGwB3X7bYaeREg1NoMzw8DyuNq2Cr2fPD4UsUHLD4WVBg+xcBsk+NEo1UnjSR1PFji+HgB/nzhw9rBy7skDtx9Pzz2B4OyFBNwTCD41Pv4kg4vkyQQXLe3JBE8bZwpPInh65vz09iECJ0tLS3eWOjsdDDgulT084ET9w4UL9y90Jh8Q+OihAr98YWnptScUXLjzoMHPra5OMXB8rRY9lODBfTT9dj2VilKygOAFUD8eN1322/Xkgju7wY88iq/EOz5+qLuDhDG5g+A7bRZXevPXe4p41DCF2NTvvx2/c+FtZy84sfTdOsOniOIqhEWzs70eNDwc1eZQoM2HkscZOK5ab3+0QV95PGLXU+wRFm72c2NN40z7ePEhKNwe3HQvFAMPfh1Hbx431C84/8bOhbfjr134o7O41GPkee3NYwi+9If7f1lZuXHhT3++sYKyjxKQIAjuJoHw4WVg22wQkDgmzhbnfoUBHULwC39E3j/efxt/JsvsINE1Ted0Dbc1FL2j4RtFcVMgYIA/Ah5iTyHGD1j0jgYffnD1L3++YRi337qAEX7n5uvsIIJrGqfZO4BE72D8chp7maqOuBp75Z+uU10gDrzWCVxLhb1kKWLo29UvOLlx/+2bN29+/JcVH7huv+kJozJ2R9dh1wbH60E0QWDRDMA6e0Usvl22AxCuoDtU4NyN+zcwj7OUvhK/zY7Z4DYIS8cM3E72HBcILmiCrncpDQ8X+MoKkD/zV7tocwo3B1wnNjeCs8IN0rfGBSd1Dfm7APlezvAowWNDb1/Y2blfbYyWojzgrYWbXY75CzcBcoBTxnUAEiXf69EeYYzHlv7632/cd9sojg3BVkj4iHvvCn3BXQiQ/5Xwj7TPbenC3/7cvuLeuWO7GuQcmAPZ82sQ4H/902ueV/sFaiT4cLjiEe317HFDQ0ORbQ4HHzf/duGO6O5wiUDlgw+HK6qDnj1uuozsNNRm/o7RMAqJ8agR2LODnj1uaLjvGKdUSDRjPFCPZx7vb0Ch/TU6nRz4rR5G8EilOpGLzopS+PGkF7ribFOZwL9jWRfa3R82cLiXUayZEErhEx4+ohu1CltDDFvJVMr1RkxViva7mfKKXlTseguhCf3w1NxYiPzgnKAZOLsYKmeiJoaGj+rzqXKZIYpSueymZWoJVp5VT4lWpGKC1eiggZ/31mqZ+gWnaoRXZ0QGp8VybW9+XrGUvb39vf0XynJY+ORyLVmcZ67FfM1ozksXLdnxKi+KllOVTSWK7Ve4T3C6ewqU60IePcaTe+U9ZU+p7deKSm0PmhahSV2YV+bZkyGIXk563mIqOptwDXX4t8HZ839b1Sd4YfnEsWMn/G8raVXElzKDRI0WLQLJVYf2ly5pYlgFS+S0cl5j90JRFGWPQdy5QYpJEf7doyJtV381t/TyMdCM2cVm2H1c5Dz38ZRPCfhY/sMe0wCFOziYvWDln3oWdD4kDBFOYjS27OZJu6CCFXg8VFEd9Oxx0yXEODGdGO9iczjkJFhzc7eDM8OhrLntqKoL3jjY0rh2z3E4Vij06XFDdHcbZIOnnSc0m65aH4VkP3Q643+O85EELyxCgX7sJHxO/Oz9u3fnMoSYeOgkHjop8OxRSfY9HsEzZy+CWl61ycMFOpPu/0F2B3LQD/gxF/zbx48ff3p2dnau7l6LYwDO51B4BRj4xdPHj5++mAZYxwPePHny5FMnO1cCDjk4MD39HOgfveCFUbzHb0M2WF8vZUoX4eqc/mxsdHQZSwR8fUwa7D17ItcxsR8BcIzQJvgnwDWGZp+xFL62dpfF+HfQQrpQMGfh0BrYfPbYkQc/3gI+NTV18WOM8X86ffz0c2jILCD4yUXQb/Ay/POJxw78xPHTNiWCH28DR/N/OaLg0CjrAn68I/ixIwrO74KeQHDedJmfJHDsenjcwP3V7Fahsbr7IiTzk0cT3NNf5LXHV6GmFfIiUnyfuKmCOT3pwh1S8HVsErBet1KpZDcQSqotkzUvqriJHmccm3wVQ8Sefm3ixE/0xnFYKl0fBS2f8PIeGnCC/RisbQS/mSmsMc1BqGfX7t69u/A06OyLjqZZXRK3zPQbyXNo832oQ1MGDlXM9OI0CJtcd1m9Czy425KrHwi42CrsUoIrvl4qIVKrGaMsoXBjdm5u7pWTKNiYffo0aAEqUAun8ay49z8nTpw4eQK/8NTHYOMY2v42mn2O1Sk8+DFeIrR5DDeYO6yNPvfsiU7gaAnkrcCcdsFPn37uOdeCpwIDQvAT11Ubhvuu9YxX30W9DPrhedCt7zr6EZrhkfNo9i5ufL5w5crCp0+BYOPKlX8AXXE+9tf3nwrUb8Do4v+6e59edGw+f9Hr+OKnwY6ZPndtvuweeb5xvs9bwtEIAp4GT/p/T1kpi+ngMY45uZRGwVaJ5fGS87G/0kFaSqdbzRp7mS6Ol5a8bmybfl/Y8XW/L/ZeoZh0YQ6exw/k4LCNpLRrQIOGB7fn14MEpzgeKKJRp0FDrjFoKHoecnpEwSnFzJ0SLDGZSnV4QA/RK7Vyc9DQanjzMMCHcIRCTiaTsmwXR84ogWeb4qAniQ5O8sVE0aA1Yy9p7Cl52h4+MelKrxWNsswklcu083SvgDPTSRZIJ/wy+2K/9lbSeyCZdC2xjWFNy1uSMj+/VysbkmWl7Nkd9vhBIl8s5kFFTdfF0iTzyC7E2EmSzuAO1wpOhP3KVauWKCdrRFFSRvtoqWjtoebn52tXryq1qzVFUcpaXjHYxcdwivKkE0A73M5JRQdCdiXkDSuVL+atSm2+VlPYlwK/TPgzv6eg72ACp8N9hR2F7fmaUi5XLB3OIRRTklFuSMGvilJhP+VyrbZXg8szrxgSqqLsoWMjoWnFfHNg2wbXa8LeXq2oJGv5+asVyzdMTBpRIIMnig6Xtajs1/b3MGx7LIivY1j3GAiERAE+S4LQQaAg2BAQm6ZmGBaGWSpyYTGuC7quaZzcHuPJTAYvKBuApu41DVSSxbioJSBZWFJKxxgneQMCZhjteVwQUrqQnE/qkKhrAglPuYJeKeqYjyj6LbBUxDRpB5MSQdC1YgKiRMLkmNd0jqU1N+onWZjF4HsDu8iETU/wHe+1cCPEyf3OJAV2pYh/RgTAcEk2h1Fuf71oq01PmAOWNNhDVE6Jwwqd1lGqw1aqt+ubCkxUHUFwMVAjwYfDFdVBzx43NDQU1SbeM4PF5eXGpvREqdzYcmdst4oYJPB4qKI66NnjplKJqDaLVjAV3HBSDZPgGRGiJAYeD1VUBz173BDN5yNOpqBaKuwkkMfdzcBCAGfthDRYA60noToSzWZvHnuEdc6IVmXamFvZpm6lOk1V5LwROYBUv5rcN7D60tVmbx57lNyTsBoUxamoFJNlPZC86+1Mtqjlm6IWKqrvp/al+dp+t5eJ9eqx5xQa1Ib3y1ejXDRa1BJWA7y3pC5aKaUW+bn3VANmZW9/vnty783jpuQyNDWE+QhnwOm0WrnmvrOHJFulNbYC3RJNlH3zb0MF19HS8vOeeY7hVnvyuCnRSmp7e/lIiYXouqy7Fzd59VshCnEc+jjdQNsUSp5kWP9dHx43JXKyJEY6A2tCNFKyC/7V/tXX//7F1198vX91/8v9F/a/DAE/jPKv5YqgRoxffeHq1a+Uq1989fW3vvzqhb9/cYTADyQX/OsvX7j6wrf+/sVXENvw2Xv8wfdfCFFwze3xUTJMjzt4qB51WvxG3+gh6f8BDq/bUTR5Yh8AAAAASUVORK5CYII=" alt="Nifty50 Chart">
        </div>

        <!-- Sensex Chart -->
        <div class="chart-box">
            <h4>Sensex Performance</h4>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxdOWFcYoYMHrTby-anPRXQDtH4AyOmNGDGw&s" alt="Sensex Chart">
        </div>

        <!-- Top Performing Stocks -->
        <div class="chart-box">
            <h4>Top Performing Stocks</h4>
            <img src="https://images.moneycontrol.com/static-mcnews/2022/12/india-best-performing-large-market.jpg" alt="Top Performing Stocks">
        </div>
    </div>

    <ul>
        <li><strong>Nifty50 Index</strong>: Increased by 15% in the past 6 months.</li>
        <li><strong>Sensex Performance</strong>: Gained 20% in the past year.</li>
        <li><strong>Top Performing Stocks</strong>: Infosys, TCS, and Reliance Industries.</li>
    </ul>
</main>

<footer>
    <p>&copy; 2024 Indian Finance Dashboard | All Rights Reserved</p>
</footer>

</body>
</html>
