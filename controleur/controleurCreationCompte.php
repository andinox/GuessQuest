<?php
require_once("model/model.php");
require_once("model/utilisateur.php");
require_once("controleur/controleurUtilisateur.php");

class controleurCreationCompte
{

    public static function afficheCreationCompte()
    {
        $titre = "Création Compte";
        include("./vue/debut.php");
        include("./vue/creation_compte/creationCompte.html");
        include("./vue/footer.html");
    }


    public static function creerCompte()
    {
        // Récupérer les données du formulaire
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["password"];
        $password_confirm = $_POST["password-confirm"];
        $id_QuestionRecup = $_POST["questionRecup"];
        $reponse = $_POST["reponse"];

        if ($mdp == $password_confirm) {
            $imageProfil = "iVBORw0KGgoAAAANSUhEUgAAASwAAAEsCAYAAAB5fY51AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAgAElEQVR4nO3dZ3fjSJYm4PeCRt6llEqlq6zMru7p2Z09Z/7/r9g9010mvVHKe9Eb3P0QBgGQkigRIALQjaoUyYegiwAiAi8hiHb39pkZIAIAgNUFiAFoixQORqYeT/c2BgHMmdpN77nYJqVoJbY5iT3YqqazYr1duB0XMcBgEEjd1v3AiNlnvdvY/jALUabmvhculUGsAGacxFIx2t3bZ9M5xbq1GOoZjJ2JuTMYc/0+5paMzfbIDhfZYh9VzHuTkmoJAD0nsfVshgv7A6z/0RhzFp7YjHJ8i8zG9E0mLoc5Q4+5JlYAg1gaFqibejQHA0xgZl3pDDBATLoboFGLWmky08/D0BO4rM2+cyqFubNHIjHvzV6KpWEBzCDuzJ7MhmKHdcB2ZElTl4wopLrD9OsRm9fI1sxox8ylMPsR3c5ZzGtzL8Wms0D1Uaz/j/4z/RcTw/RfGGdORzepua+TtamVx3xJUAbT7WU+pZjXFq2RYmkY7e7t6YCE3XsAJsSTeB5vgL7NzuVtBtVVup3aLIzhfMbiGoOjXV8S896Mx6ZgYg+1qj1AIfntRrIDAIFJLR0zmBGFJjIG7L6+251lZQCgdqeoJKbHDTi7iWLeGhAN1xCb2gICg+1Gwepejhay4buDrhGrzgiY0NgN9DlzMx0lOe+70GYOd9D3i/ltZhdRLB2rAvpOs6un+y570CgRzKPNBhQ/utx0bZMZgWDny/p5srT4dRTe2Biz/bxiHpsRFkvD1HFYZO5TMxO2NW5MdTs8xgjRxG0yA5gJzKZzydaYo+6zFKYvWTeamOcGvSkRxFIwCd0LZgwPgmSxyc04uyD2UJPQvXCG3INkMQndJXTPyExHSc77LrQ5gaRZRsxf8yWsLotJ6F4wY2PM9vOKeWxGWCwNq4IBUr1T1L8QnL6LY7uUajIWGdlGYtsr3ma2AzPtq18jK1MdGGwHUHQjioYDsJj3RtC/NiaWhlXjM6vYVg/TZSUuRm6YZIsnNMDp+LI2Nj1wOYzhNhFj9BxkYj4ZA872Q2JTWgAQbHemKxsA3ADRjvixYkL0KEyfxGIdHSNzAwhMiM0Si2wJFPPcSK6lei0AOJoFkf461hkiTOgFmCA7biZMJ0xm6jgv8yLI3JgYpN9vKYycb6MYYp5b7JtDsalNQveCGRtjtp9XzGMzwmJpmITuBTMvgmSxyY3gRVhdFpPQvWDGcJuI4Uu4LDbeGHC2HxKb0iR0L5glUMxzI7mW6jUJ3YtmHgTJYpObL2F1WUxC94IZG2O2n1fMYzPCYmmYhO4FMy+CZLHJjeBFWF0Wk9C9YMZwm4jhS7gsNt4YcLYfEpvSaHdv33ZmZgG17evOK3nvWNOL243sZlN3YHbm9rJlMSlSHmkJAMSCLdK3lahAPvqzXjTG9KOIJjI7eTDLZG5OKYXplmHzQ8xrsyKWhlUB2I7IbBnmW4744M6xPZVowqaWjU40d4fB+VaF1DQsSyPbkaE0BnB8z13MW2OxVK0aHaIAM73S1wnmqCy3P7APtWaemO2z32aAeT2358vOGOpwgOj9F9uYAIqqVd0j5q0l+zGx6ayaHLlNrxTvBEaGj5iZJ44H7DdY7F3okDxDU1+0UeyTF9pid3FUwWJeWrQqqmtiU5qE7gU0KVIeaZHQvXCmW4bNDzGvzYqYhO4SujtFzEdjsVRNQveCmQ9BstjkluzHxKYzCd2LZrG7GJMEv2L5WbQqqmtiErrfbs5GXxqTIuWRFgndC2e6Zdj8EPParIhJ6C6hu1PEfDQWS9UkdC+Y+RAki01uyX5MbDqT0L1oFruLMUnwK5afRauiuiYmofvt5mz0pTEpUh5pkdC9cKZbhs0PMa/NipiE7hK6O0XMR2OxVE1C94KZD0Gy2OSW7MfEpjMJ3YtmsbsYkwS/YvlZtCqqa2ISut9uzkZfGpMi5ZEWCd0LZ7pl2PwQ89qsiEnoLqG7U8R8NBZL1SR0L5j5ECSLTW7JfkxsOpPQvWgWu4sxSfArlp9Fq6K6Jiah++3mbPSlMSlSHmmR0L1wpluGzQ8xr82KmITuEro7RcxHY7FUrWo7Fia9GxeF8BTr4aCX45hFownbfc7bDASQSSWNZmr6PROp3dOim6lEO8CI+Wxmm2GxVMxmWA4Bseo31wDozs019c1VtIHdZeSYfZ2MrbTFaRoxT01KqqVqrkQHMeiiK5/0zMssBSRNTQASdLOB7MxNf6eXqXk46Io9JsOY22IPtljobjoXdVv9Y4pmX2qBMUbqymQWXVe7O9la7IOVwhgg3X7MXpr9j1m3v1/vb6am2858+SQ2nUnoXkADZh8kq7dh2jTqQcMwtP8GwxAchgiZbX5JAYEoQCUIUKlUEASEIAjsumFjUXYOLJ7xZ8vSWCxVk9C9aGYq0Q4w2RnrDsp0lr1eD812G81mC+1OB91uD/1BH8PhEGHICDlMrmG2EJHurCqoViuYq9cxV69jaWkJS4sLWJifRxBU1ECpB50sP9uszJewuiwmoXuRi9M0aRjrKbSpul6vj8vra1xcXOK62UR/MLDrgFmeknUfe2qTKo6+nHmsmUEGQYCF+Tmsrq5iY30NS4sLCChQa6UdVNP9vDMxKamW2JHubn3bbT6GSK6RMPuJTGw7u1st9nQmJM/OPBx0vTO342l3Ojg7v8DZxQWarTbAjCAITAWrH+Ts8qdszIyQGbVqFeurq9h8so7VlRVUKxW7uG/1d6thzG2xBxvt7u3zyEjp5CZmp879FZu4RR3RROZOfuwGk6GVrjj1iPiocl9jwLb70fEJjk5O0Wq3nQ7FtLXzcMzGTCcGANVqFRtrq3j+7BkWFxcQhqHu3Kavg8zNjNcw2arYNKY6LJjuJdFpEQBEBzywXcQ9CMIN2Ccwu6noNTRjM/mL/UyFt+mHKTOEdLtdHBwd4/D4JD7rIfO6FJtl52lEhGEYYmVpES93drC+vgqiYMx69vB6ycI4cY/YdEY/fu5xckV11hWYBrCjse21+EFNGr2WGYU4c7NddRksVqvxAeEuY6isqN3uYO/gECfnZ+AwmUMx1ETBTwMA5hDz8/N4sbODrScbI+vlfeslU7MzVYDEpjYJ3YtcnKa5zUwnPhgM8GNvH8fHJ9EAFHvIuJDcU9Od99xcHW9ev8LG2tq962UmJiXVIqF72Y3Uxn1wdITdvQOV/wAwGVEWwfmsLQxDrK6s4M3rl1heWtKfkfKveyQcYtOahO6FK049Ij6qJI0oQKPRxOdv39Fqt2Mbel5hehZGulMmIuw828brF8+j5Sasq8zMjNfwL8AuoknoXjibbEgKwxC7+wfY2z9QhyXYzlxdcWfP5TKgXq/j7+/eYnlpUa+Ht9dVlsaJe8SmMwndi2axWo0PCNAjfLvTwccvX9FqtZ2civXdzqBUYgOAFzvP8PLFczuIjdTVLExvM7p7FZvSJHQvcok1jWqb07NzfP72HWEYAhS1Zu4h+YzNDF4ry8v4j9/eoVKpOLP+0frLzKSkWiR0L4sB+PpjF4dHx9FGqYcikF8h+SyNmVGv1fCPv73D0tKiUy8zaiOMuS32YJPTyxTOGLDbJoOhfpXl/cfPtrPiRIOr2/QojUDo9fv4/f0HnF9cAkSx+htXp6mafmt5n5alLCahe+EsPnT3+3388f4j2p0OAJ/Cb/+MmfHm9SvsbD916jFZp+kaJ+4Rm87k9DJFM1uJQLfXw5/vP6LT7cZDaHVqV7GEERG+/fiJwWCI1y+fIww5NvDaXi5F8+W0LGUxCd2LWJjR7andnF6vp9sEtuV8Cr+9NGa8fL6DVy+eu2u3rtskTGlSUi1yTvcCWn8wwL//eo9+vx+rWz2lsAOF2A0Gws/9AwDAK32QaWbthjG3xR5sEroXzAaDIX5//1F3Vu6dqvgQdBfBiFSndXB0bFZVtaZK6O61yTndC2Lm+p8fP6KTDNhhBhCxiY1JZ1q7qFar+qwPyaHdPUr+YcZiqZqE7gUwhmqjD5+/oNlsIa0QWkxd//LtO+bqdawsL+kVyKzj7kD+MPMlrC6LSehekLK7t4+f+weQgD0bC4IA//1f/wvVSmV03XE2gXublFRLYK6oZnNq20yIOLrHdGauqdvqxiTGIPXcDDUDy9jcz1JIA3B2cYmfBwd2ZkAM2P1zsxspNpWFwyH++vjJ/omyWHu4E6f72rjbYg82Cd09NmbGYDDApy9foXI5xIovAXY5jNBotrC7tw97wLMe9yR098ckdPfUzEf66+NnO4BEu+uqPr0JsEtiRIS9w0OsrqxgfW1V1Xm8j7u3sViqFtiQnZ2Nxpk6q+kzdBxFI2Y2MvW4uw0EkF5ZbBtnaKqr1p+nQEZE2D88QqPZhO3wie1AYDYQsfQMAAIK8PnrNwwGQzDrLYZ1G9nrkxuB7PYiNr1J6O5hYWZ0uj38z+9/RGZmBYBT+/mH1aU0BjafbOC3t7+ayndGQ9zPpKRaJHT3zMxo/+nLV7iF3JkYA76E1WU0InVesfPLS1P5o+02qY27LfZgk9DdMyMiHJ2coNlqYbTEh2/VbGJpm+q3CF++/dB5Itt134yFmNT00+cdVpfFJHT3zAbDIX783AfFliMQSeg+a+v3+/i+u4/XL/XvG+olJXTPz+RId48sCAL83P2JwWCgPgMI0TnFyKsjxB+LHR4fYXtrE/W5ul7F3MHdbAs3my9HiJfFAtNQTAzz1S6cf0w6QNezrqQRYKYJk5mdNusVZFZmb/ppzIxer6d+GZfI3md2W6IZgHtWDbGsbTgM1UG7gN4m4LQhTWwklopJ6O6JBRTg24+fCEwjxXYZdd17FEw/FiMiHJ+cot3pKDb/aExbjrNxt8UebBK6e2LtTgdnFxeIijN43GC+hdWlNB1r/Nw7QBCo9YvNgnp7uNXM+ONhgF1Ek9DdE9s7PMTYgH2cwRjsCCSWrZ2eX+BVp4O5uTnc5zQ0LJaqyZHuORuz+jbq5PRM1a/el2YyHVrc8j4a/LEawNg/PNLbCiBHuudjErrnbOqbqBM1o2Vl7m8SJC3vEPqxGpE6mHQwGERutxM47Tre8g6ry2ISuudoqpNiHB6fxEZzApmearwx4FMw/RiMmTEcDnF6dh51SMn2HWfjbos92CR0z9GICOeXl+q4q5FCd5qZfYnNxojUL6RXAt2p6e3BjI9jTT9V3mF1WUxC9xzNfGVuioTu/lu700Gj2cLC/LzTrUnoPiuT0D1H6/X7uLpu2I5dQnf/rVKp4PBI7cJDr98Sus/Oqm7objYQt8QDYNWIrrmnkmGazNRaoF9nVgZz0w9jMC4uLzEMhyAKQIgGhWTo7poZdcyziM3WAOD88hJvwpe6QzPbi3mAu/1EbU5iqZiE7jlZJQhwfHKGgALYWZft3+h2YyDvEPqxGlgdhtJwz6Zh2pei9rU27rbYg01C9xyMmTEIh7huNBILuuVuU80mloddXFzq2RXDjI9qOoy46YflHVaXxSR0z8GICOfnl7ZuKLacyqxuNRiDHYHEZmdEhPOLS7x++UK3qYTuszI5vUwOZlb4IFB75Kw7Iztig240MODmjGL5WLvTRb8/QK1W1QOJbl+7ianrZpthsVRMQvcZG+t6vG42xtQvRuo3aWbUiZ5NLC+7alxjc2Mjal922hxRm6tBSywNqwJqo7G7UbHZAZSDo4HDLKvNsr7vLmPnp2ngTA36wzKbIzdyNQDo9nro9fr6PUffPtl1/Q4b+WxiM7cgCHBxcYWnm5sIOVRLuTMyZ54Au21BbEqr6rHDGTqcTMjpmNxeb9R0M05g0Ls40UiVsZn+l9T9eRsTod1uw/xeprkPYHv/bUaIsiyI5WqNVhNAvDszJW6M5J6L2MMsIMD2XmqWBahrpm+LrmGsQXVKNJnBPD+r5s/azKZv33nORgCuG3pF1z26rVm625JFLD/r9fro9/vOAJ+81LdYLC2r2qlJ7FtBPS2IzVvYzlxcU9k2O69xh5H5thA2UMvSovfqjzWaLdsZxZfTVXyLuY1n80exXIyZ0Wp3sLqybPNdU6JOzEwE7EgqNoVVYWZWJnQ3G4ZZ0HZUANzQXdtD/pBq/NuX7M1+cA+MmdHpdmy92DDdWf5W0xld9GixvAwAWu02VleW9WBp7nTzRlXu3m0Um8QkdJ+lMTAcDtHv90Gkf8lAQvfiGgHtdltrYuCEmQCon3mH1WUxCd1naID6hlDVPd8ZsI8zXwJnMQDM6HS6AOJd2ujt/MPqspiE7jM1oNvtwdwhoXuxDaTOuCGh++xMQvcZGhGh0+3qwNbs4rnLQUL3gtlgOEQYhgiCQEL3GZiE7rM0InQ6psPS79fWdFQkdC+GAYThcIjhcIhKpeKM5W7eqJt+zBxN7P4mofsMLQChr0+HPGnAPs5GPptYLgaomdQwDCGh+2xMQvcZGgAMhvr87WbGae+T0L2Ixqz+OEV8BYx3cUh0ZmIPNwndZ2qI/uAEQUL3kthgONTXOHGpb7GYhO4FDN0BAod67iSheykMAMIw1Ncik9A9G5PQfcbGTkNEt5M7ELeYJ4GzmDLA6ZzsnW7eqEq8NcUeahK6z9CIzSgdjQESuhfbGNGs2d3OJHTPxiR0n6GZHocxWcA+znwKnMXil25Jzo/zDqvLYhK6z9hsLRIkdC+FMYLA3Du+C/MhrC6LSeg+UzNHQ08WsI8znwJnMQCg2HVTJHTPxiR0n6HRmPsldC+2gVj9bUlF+k43b1Ql3ppiDzUJ3WdoDEK1WkW315PQvSTGDFQrFUPOUuxQ/mF1WUxC9xkaAFSreuU2M057n4TuRTQAqFQqIzPn5Pw477C6LCah+yyNGbVqDaYXl9C9+BZQgEpF7xLaLoxjy/kQVpfFJHSfoTEIc3P1aFCg5HKQ0L1gVqkECCoV1cZuliqheyYmofsMjZkxPz8fW7kldC+uASqTrASkB0tzp5s36nUAY9YLsXubhO4zNWCuXlf3GpPQvbDGzKjVaiAK1DbkDpwwE4BoWfMkYg83Cd1naEDUYUnoXnwjIszP6QEovpYnbucfVpfFJHSfoRHUt4T1Wg0gktC94MbMWFxcdCVxaZYTk9C9gKE7oHbr5ufn0Gi2oh7JLgcJ3QtmCwvz+j4J3WdhErrnYEtLi7huNKO6tLWuP8Nt5kngLKbWsUX3SxR7p5s36nUAY9YLsXubhO4zNjBjZWkZBzjW7zlauSV0L5bVajXU63WELOd0n5VJ6D5jYwCLC/Ox0dp0sBK6F8uWdH519ywh/7C6LCahew42NzeHeq0moXuBLQxDPFlfdU6PDESzL44t60NYXRaT0D2H0J0ALC8t4ax/kVgOEroXxADC6sqK9vhyrqkl8w+ry2ISuudgDGBjfQ0nZ2egQM2lKHY/32yeBM6P3ebqNX3QqNNK9gFu3qjK3buNYpOYhO45GDNjY33NXUpdN1cldPfamIH19bVo5oUxMyxj+mfeYXVZTEL3HAwEVIIKlpeW0Gq3bQcroXsxjBENOEC8Oxtv+YfVZTEJ3XOyMAzxdGsTYSihe9GsVqthZWlpJGuJrrsGL8LqspiE7jkZwFhfW3X+gIGE7kUwAmN9dQWVSmCXkdB9diahe442V69jdWUZl1fXY/KP5E6FNg8C58dswzDEs+2namZMpNvENpJ+gJs36vYeM28Tu79J6J6jEQhbm5u4vLpW99oVP1rhJXT3y+brdSzb3UGz1JgZljH9M++wuiwmoXuexown6+v4VqlgGA5Vxy6hu7cGZuw8M7Mre1dsufGWf1hdFpPQPU8DIQgI20+3VL0TJHT32CqVCraebOrOygzq7Cw1zuBFWF0Wk9A9Z2MGnj19ir2DQ8DWu7scJHT3wNRseA21WlW13ZiAXUL37E1C95yNANTrNWw92cDJ2XlUv7YlVJHQPU9T7fV851nUWdk7nWxxnJnHY8w6IHZvk9DdAwMznu/s4PT8Qn+OaIWX0D1/YwY21tawuLBw+6lkJHTP3CR098AY6pQza6sr6hAHU3eQ0N0HYw7x6uVzhGE4fraMuyz/sLosJqG7B2Yykl9/ea1OV0JObRMkdM/RmBlPNzexuLCQ2M3jxOVNBi/C6rKYhO6eGBFhfm4O21tbOD49hTkoUUL3fC0IArx8brIr3BqwS+ievUno7pGFodr1OL+4wDB2YjhAQvccjBnPnm7ZP36r6t82iH7AHWbae8xcTuz+FgC2iXSnpns23aPZ9MSOGHFLTN7uNNavx2A7CmVq9m2w9wYC6rUaXj7fcUZtc38yZTFDilgmxkC1UsHrly/gHsZgW83Zpm413cLMLJaCSejumzHj2fZTHJ6coNvtqc5NQveZGzPj3S+vR2bCD5sl5B9Wl8UkdPfN9LW/v3urPwZJ6D5jAzOebKxh68mGgcTlfQxehNVlMQndPTQCYXFhAS+ebWPv4NAG8MnG8yWYLptVKhX8+strfV8iI+X4Y+8ywEwE7EgqNoXR7t6+bi62dwJRtxTb2WIndDebm95luU/o7iaSDGRuRSysB5Df/3yvz0qq6jw+ZDBYLFULmfGPd2/xZGPdaQz7gPublFSLhO6eGhEhIMI//vYWgOqq4t1y1IGJpWPMjGdbW7azsq3hdEL3Nt3CeYfVZbHANpsdHW4O3ekGs+00gUW51ozM9L+E4hkY9Xod79784rSJGTCimbBYOrYwP49fXr2MdvEQHyYeZmpwV+uk2LQmobv3BmxtPsHzZ9uxXMQUGhGx+xrrdfU//+M3VCqBzqLcuubE5X0MXoTVZTEJ3QtgAPD65Us0W21cXV/bxvMtrC6qERH+/u4tatUa3HLfgF1C9+xNQveCFGZGyCH+/ecHtNttOwvwJawupql6ffvmF2xvbWpw7rSVP4VJSbVI6F4QAxEqFOCfv/0Nc/W6/qzkbB9mVBKbzFRn9fL5Dra3Np16hrNUCua8ltj0Rj/29tWpmRhgYmf6hWg25bbFTWYec4dFzQl9lHfWRlB9MUeja4ENALrdHv7njz8wHIYAEdzfhINZXuxWY2bsbD/Fm9evkDzWKv0Sfx9iDzcJ3QtmAKNer+G//vlP1GpVRDPfqIzb9MSi+hztrNylOHE5rZkmEkvDaPfnPjMxzInkANUhqdbVPZvZKNzQ3ex+EezX8PYFbjM3EB8Xkqdt9rOgJMb6IxLanQ7+eP8R/f4AtkFtuBw1gFjcRmdW7KzipvdKxwA9EUhshGIPMwndC156vR5+f/8B3W5PgvhbzHRer148t2fDiAZmpzireyomJdVCu3v7bJo3mh4nriOafo2zaGaDyQ3aszbTBTN7cf72qQ2JwYUZg+EQHz5/wdV1I/7VOpKHSTxWU7ff/vIaT7c2YxGIu5x6ZNqmfrKzToo93CR0L5iNK6aeP339hpPTMwRBYB4VLQMg76A7LwuI8I/f3mF1ZQX5lLSnbY/XJHQvmEWX0XUiVde/vf0Vb9/8ogYad7GoBR6VMQOLCwv47//zv53OarT+sjV4EVaXxSR0L5zdHfw2mk18/PJVnQDQWc638DtLU+H6Nl6/fIEgAKJuLbuAXUL37E1C9yIXp2mSNgxDfP+xi6OTU91mpj1hW9iXQDwtA1THVavV8NvbN3pWZQbYm+sqU5OSapE/pFo0gzO4JAJ21wIivPv1DTbW1/Htxy463S6iGXL8+cpgZoa1/XQLv7x8gUql4izFt9ZVpqZ/5h1Wl8UkdC+YPaQMwxB7+wfYOzjUzUC6hoC8A/E0LAxDLCws4N2b11hZXkb2R67ft+Q1vSufqcManAa2++NwHsfOk4yYvqQJDdHN2FvLyFTP6rx+WQxwrk9mvX4f33Z/4vz8wtmo818JH2rMjHqthlcvX2B7a9P5y8z3q5dsDXAPERKbziR0L5w9PAxmVn8YtNFo4ufBAc4uLkH6/vigFTWejxYyo16r4sXODp5ubqJSCaaqlywNUNtT3mF1WUxC9yKXaSYpANqdDn7uH+D84lLPTmAXZOeaD2E6WK118/NzeP7sGbaebCAIgvG7fz5NBqWkWuRI96IZRgeXh5qZcfX7fRwdn+Dk/BztdkfdP2Z30WRqs7QwDFGpVrG+uoLtrS2srarjqWZ7tPo0pn7mHVaXxSR0L5hlUcwshZnRardxcnqG0/MLdLtdBEFwQ+cFpB+mq2KyqJXlZWxvbWJtbRW1ajW2Xhar+DTlK7ZJ6F5UA5zr6ZnamyYEQYBWu42z8wtcXl+j3WpjMByOzZTiZdKVELHnCoIA9XodK0uL2NhYx/rqKoIgcIL0bD5v9mYGBIilYBK6F85mHyQTAcNhiE63i1a7jWarjXa7jW63h16/jzAMY53PzUU9V61axVy9jrn5OpYWl7C4MI+F+XnU63W7ubvfYuYdnEvo7o9J6F7kMulkJgVzdxvdmVXIIcJhiOFwiP5giDBUs7AwVKMiUYAgIFQqVVSrFVSCwNnNjDpkO1ia557hZ8vUpKRa5Ej3ohmcwSXWUWdrdqBKbJBEhEq1gkqlgnodtxdyPwWc58v3s2Vq+mfeYXVZrKq6J3JGhygsh9MxRU0xznT3MIGZ3crYYJSlmf6XYEfyIhtMeyVK7jZ6150l9/c8Mxt35L3YQ6xKiKb7apYFuNWdPDpm1HTnZXYB7zD1BGQzM8rYzPs0PXXRLd4W6Vn0jS7d2Pkws/4HMKvcKlQ3lOk2ZpjwPno+tX7pS71LGBDFZnA3vWZ0f7Z1kI1B14VYGiZ/SLVwltyIH24EABQAAMKQ0R/00eupIL3f66M3GKDf76M/GGDQHyAMQwzDEMwhwpDtpX1u9QJqPXEu3dcn3UmZHCsIAgREqFYrqFarqFVrqNfVZa1WQ71eR71eQ61aBen3at6vqSMbe6VUL2mafof6tti0JqF7kUt8ILLmZipuSB6GjMGgj3ZHfdvXarXQ6fbQ6/cwGAztbMmUkV+PMZ3cDW9msiPYb3isbbLEa+r3EQQBatUq6vU6FubnsLS4iMXFBdTrdVQrlaM4QN4AABKYSURBVNH36rz/2+oqc5OSapHQvWiGeIdkit2tDwhgoN8foNPtoNlso9FqotXuoNfrYTAY2MfGd8N012I2fJhRLlrOnYNHj4pmgPFh42Yb+1iKWzLADsMhur0Q3V4PV9fXdo+AANTqdczP1bG4sIDl5SUsLixgrl63p5iJnjf+OSR0L57Jke4FM1NsB6U/b6fTwfnlFa6vG2h12uj3+hiGoV1+XEakNvj4tKCI5taJKVV9rNfS4gLW19awsryMer0GDkOEid3U7Ete07vymRzpXhBjuLt2IdqdDq6ur3FxeY3rRgPD4TB2fJMPK1f+poo5sHVubg5rKytYW12xHVjseLBMgn3z3BBLweRId4/NnUV1u11cXl3j4vIKjWYT3X4fBIxkN7dlOWLKmNUvfc/PzWF1ZVnPwJZQ1b+vaDaQaLWPOqT7GqC2p7yPEC+LSejuUUnOdDudDk7Pz3FydoZur6/qH3A+26RBt9g4M/WtLgOsLC9h68kG1tfX7C9b2+WT69P9JnlSUioSuntgcDqq60YDZ+cXOL+4RKfbjXIqdmYJuH/QLTZq8aP4Q1w3Gri6ugKIsLy8hCfr63iyvoa5uTn1KDcMltA9F5PQPU9joFIJ0G53cHh8grOLS3S73VjdE0PPTKGPfI8P4+qWWNohvl13A8LSwiK2tzbVSQMrlcQZJCYpo88v9jCT0D0XU4cdnJ6f4/D4BK12G5UgiNom9lionir5fLEilrWFevdwfW0VO9vbWFleGnPG0zHrOuBFWF0Wk9B9Vkbq9vV1A4fHJ7i4vMJwOIzvRkT92Y3mW4D9mMw4gzFfn8PW5hNsb21ibm5u5LxdErpnYxK6Z1hMRxWGIY5PT3FweKz+PiCcDUPXJSGqrjsNQPRosVwCe9XAICKsrCzj1fPnWFleirW7lPSLnNM9C2N1Bs1Ot4uj4xMcHZ+gPxggCKLfhTNlkllV0tzQ3d4vlpsB6livpcVFPH+2jScb687uolo277C6LCahe5rG6viedruD3f1956/RkH1/prKTYfqk5kswLTZqZn2v1+t4trWJ5zs7evwcN+OKP5fYZCahexqmX7TVbuPn/gFOz84R/dqMrtCR4Hwa829FEkuoHrxe7DzDs6db9qDU+JH1iD1W7G6T0H1KC4IAzVYLP/cOcH55OXY0fchu303mUwgtdruZg1Jr1SqebT/FzvZTVCoVvS7lH2AX0SR0f0AxnVK/P8C33V2cnV2AoetGv/SDwvRJDbCt5EsILXaTRetMpVLB65cvsL21aTszCefvVyR0v4+xGjUHgwH2Do9weHSkTyRHqc2gJjGfAmexycx0YCGrQyJev3qOzY2NkWXzDrV9NwndJzQwQEGAo+Nj7P7cR38w0DOf+wfn05gP4bLY/Wzkpt4ulpeW8PbNaywtLuovZxBfcNyDH7lJ6H6HqT6Q0Gy18OnrN7RabX14gq6oVMP0Sc2/FUnsFmPA/o5uYpEwDLGz/RSvXjwfCeYBeBF0+2QSut9mRBgOh/i++xPHp2dIlix3+26yvINksfuZWq2SEcqo1apVvH75Ak+3NuPPaZYDxAAJ3W8rF5eX+Pz1u979M/XCtpZmErCPMwDRuxHz29xt6WYzndTqyjLe/foGc/W6hPJjioTujpkOeTAY4Ov3XZyen4+sMHnMqpLmS5AsNrmx/nmn6XXw19ev8HRr0z6feWqzbN7hd14moXvCLi4v8fnbD/T7fZgj1IHsw/RJzZcgWWxyS96cxJgZK8vL+Pu7t6jVqvd7cIktICDqvUA6miKYXUP3Gsaaej6iyQzm+ZlUd5GxmXHMvvNxBkLIIb5+/4E/P3zCYDBQn1BnWaQXNn/QNE9LFjH/TRW+lxERGs0G/u+//o2z8wt1j8mNefSxj8VU6O7cGe12IMqCOIrByCzE0TdoSCx3t+nZzQwM5rX1hxoxAO1OBx+/fEWr1YZd5ch0aqYT98Oi1rGtIeazxf7a0cOMmfF08wnevvkF5uyz7rLMZAe3slsVpp5UD6Wqyi4UVQ7BGeNjBrvrRBMYnBePhYoZmf0SwbkvyusIJ2dn+Pz1u71tlzNvXn9gX0w1k9upkpjXhqiDeaAREY5Pz9BotvCPv73D/Lw6ZbPaoJ3V5RFYlGFBz1KcmlOdl3uMlpm9xM0E8fZp77D4N5I8AzNjljt7YXz7sYvD4xPd+VJsGbucj+au0GJeG9m/kRC15sNN/e7q397+iifra7EoBwDiYXU57dGF7oA6tuqvj59w3WhGM0G7jvkTsI8zX4JksckteXMaM3sAL3d28PLFzvRPWDB7dKF7s9XG//vX77qzUm/KhzB9UksWMf9NFU7FzJ7N7v4+/vzwCWEYAmAvAvFZ2KMI3QECEXB5dY33nz4nvm2B6RGcDttfi1rHtoaYz5ZC6H6TMTOWl5bwj9/eoVZ1D33wJyRP2wIQbDBOxGDdW9vdKz0bI9K3E6YmM2QmNXcazIuTmdlla+Zlj05O8ddHMyJFFUKkPqvbGfhsarAhwJk9inlsEaduBEKj2cS//vjL/q0Au/066z9KZIGpD9h+iFTYp2+z6Z1UjzDWAPdo3dsN9vGAe0bOTIyV/dw/wJdv3+3nhFmKdAMXyWDaQNWwmN+mVkJ1kYUBhF6vh3/98RcazZYa2OwGDrDZOyqJRX8Vgd071QKkH8QKoklLwgAVsE9isffBnKkREXb39rG7tx/tLpqeWBeKeoZCmPpcsLNiMb/Nth1lZ0SE4TDEnx8+otFsIj5DV4lzWayUoTvrjunr992os9Ijkw/B+TSWLGL+myqcqRHUqWr+/ed7XF1fqyV4dLmiW2A2eD0RimIqskuqB+n/kgZnN2wi0xcqJEfqZsL3rz92cXh8BApIf2hS/8jZxSqg2Q8ca1Qxb03PhmZjapLw18fPuLi80gO1WXF0JoRiW+lCdyLC992fODw6ttNI8+F9Cc6nMTXYkBlRxHy3iGdkajv48PkzrhtNiz4F5xK661HGBOz7h0eIzrQA23F6E5xPY8g/SBab3NSKqS5mZqz+/fXhE5qtFtSsAbbkHZxPY6UJ3YkIh0fHpQrYx5n6rPAuXBYbb7btaNYGDMMQf334hE6n66xT+QfnErqDcHZ+ga8/duH+8rMPIXnalixi/psqPHMjAP3BAL//9R5hGOoJxOhyRbJShO6tdhsfv3yFOdsCwN6E5BK6P3LTM5+8jIjQHwzw58dPNuONulV/wvRJrfChe6/Xx18fPqmPpxvEvHUfQvK0TQ02dkQR890izs0IhEajic/fvgMmpjHbuds/FMCqbufM+sPp3spWv92AmMF6puQaKNEz3mLqedUzR8H5/Q0AOAzx/tNn9Pp9O5qYBlKzOqfdCOUwMKKdQ3Mp5qsR9FbHUZ+SjxFOTs+wMD+Pl8937Hplij2li+cW/cYkRwuYfUYiUh22G7gDY8zsiuFOMz/ZvBA9zIIgwJdv39FstbSRfk9q6zanZXE/VxmMomqMN5uYp5ZouxyNKMDP/X2sLC9jdWU5etNgO9j7bsUM3UE4PjnF4fGJ+iC6g4oVa/4F59NYsoj5b6okV9B8jBn48PkLev2+nVD4EKZPaoUL3ZkZnU4XX3/8iJ5dB9NqIsIxyzskl9D9kVtsypW/mT9j9+HTF1AQRHsltqv1J2AfZ4UK3U2o/uHzFwyH4UjAzrpBXMs7JE/b1GBjRxQx3y1ib0z9RZ4m9vYPYM8qrN+5TwH7OCvUke7qSPZ9NNvtkYCdCWMN5tkI5TCYNlA1LOa3qR5CXfhkgPqtkFarbQ8HMuucKT5aoY50b7Xa2Ns/RKAr2LxnczT4OHM/VxmMADvRNfUj5q/ZtiP/LAxDfP72ze65+HZUe4GPdFfv8ePXrwij4SIqBAndxbw1VZIraP6mdg1b+Ll/MLoEjz7WBytI6E44PD7Rf+gUNwbs4yzvkFxC90duekbjqwVBgP3DQ3R7Pf3e/QnYx5n/oTuAfn+A3b09BEFwa8AuobuYdxaxnwYgDNXf6ATMNgRnqiihO+4TuqvzW+1iOAyt3RSwS+gu5psBbDsKX42IcH5x6Zz0T5W8A/Zx5nXoDla/2Hx6fh51Rhw9t3nPErqL+Wq27chzA/D1xw+nw8o/YC9c6B4EAb5933UnZ+p9Ohv03eZfcD6NJYuY/6ZKcgX1y4iATqeLo5NTtQSPLueDeR26NxpNXF5fTxywS+gu5p3pGU0RLAgC/Nw/cP52p1npJHQHCDeG7qbpv/3YRRAEEwfsErqLeWcRF8CAbreL45PT2K6hhO768qbQnYhwfd3AdbMJE7xDvzcJ3fMPksUmN4Btp1AEIyLsHR7Z/Nmsh6bkbd6eXubg6Fi/GmHcaWMmNfdzlcEo2ZAQ89sSbVcA63a7uLi8wsb6GuKF4X6LmId5GLoD3V4XZxcXdncoVu5t/gXn01iyiPlvqiRXUH8tCAL9x1xgJx1ANJGJPWrGVjWdhXlfpnNjAOTMgOwuGyNmsb9QM4np2cJNFgQB9g+O9BtVW6vpVOkBBv0u2OxXFdz0PYAjYh6byYkKZq12G1fXDawsLQFQX2JF2SpyM79CdwDD4RAnZ+c6y8K9AnYJ3cW8M7c/K5IB6hAHIq9Cd6/O6U6k/lzXcDiEPU+PfR51eX+D7ThLYaqmdAOaSzFfjaC3Oo76hSIYEeHi4hKDwQCVagWmyDndyb0HOD49tW/pvgG7hO5i/lmi7Qpk/eEQF1fX2NxY13dK6G6NGej2eri6bkRvWHc8sXJv8y84n8aSRcx/UyW5gvpvAREODo8QBOo3+CR0T9jV9TVCM3MjSOguoXvxzbMw/X4GNJpNDAdDUCCheyx0D4IAJ6dnCIgeHLBL6C7mnbn9WRENwNnFJcxfp9IL5ha6e3GkOzMjDENcXTcQvZ37H9UuR7qL+WYA2w6giBYEAU7PzqIhVI50V4cvXFxeOcur3lxC91GjZENCzG9LtF3BDAAarRYGw6E+gabzYfUnfnyhO4CLy0sb7tmiO57pzL/gfBpLFjH/TZXkClocGwwGaLU7Or2JL/c4Q3cQrhtN+/oPDdjHGfS78Ck4l9D9EVnuwXk61mg2sLy06Mx+HmnozlDnbO/2egCboE1C95tMDTYE78JlsfHm9mdFNSB+uJHpI/R2PEvL/Uh3Zkar3cZgMIh9dfqwo9rHGWzHWQpD/kdvi01uvh3B/hAjIjSbLZsxu5s1ABspzcLyD90BtDsd3XtPF7BL6C7mnyXarqDW6/cxGAxQrdbcjwvTT2BGlnvoTkT27w1OH7CPM/+C82ksWcT8N1WSK2jxrN3pjtjjC92h/jKO+WVn04GqS7W1TmPQ78Kn4FxC90dkHgXnUxkIrXYLqyvL+nY+oXsV5r2pHkq9PdaLJHZF7BgfM8SD7jsMph4Au8vY7XUVs/tYFThjSrM9sO00i22qmdyOjMS8NtjtBQW2IAAazTZUPhzCmcvowjOx3EP3wXCIwWAIs6iE7ncY8g+SxSY3X4Lz6U2dOhkEd+dJfdrHErozM4aDAZgZAWjqgF1CdzH/LNF2hTWgPxjoe119RKE7APT6qhJMJxMrqZh/wfk0lixi/psqyRW0eDYcDqJDG8wSPLpcaUN3AOj3eyNvit25aAqGWCWXwfxYgcXuYWM2xKLZcBhiaH+nELmE7rS7t2+2dIyG7pGrRbSPMdU93W3OW7F1Ef2lWSlSpPhcKpXAmdwkO5fsLffQHWBUKpXIYl1dWhbNv4pusJ8s2kEX89l0W9r1vzxmyqMJ3d3vLbMz87JcEovPVAEx/222wXSZLfcj3bO2aIZSDosuIVYIw8yD6TJbYDZuZtgJChH0L59HD2T9X9KiIzQnNH1hD+7M2KJ3QeUxXasQ897UXIDEUrLcTy+TtZmppLtfXGRzGzJqWDFfjdztT2xq8+Kc7lmaLUTlMCOkrov5blpYrDTndM/WzMv6FJxL6P64LP+wuiwmoXvBLLqEWCEMXoTVZTEJ3YtoulYh5r35ElaXxSR0L5i5DRk1rJiv5ktYXRaT0L1oZoTUdTHfTYuHAXYRTUL3wpkvQbLY5JZ/WF0Wk9C9YBZdQqwQBi/C6rKYhO5FNF2rEPPefAmry2ISuhfM3IaMGlbMV/MlrC6LSeheNDNC6rqY76bFwwC7iCahe+HMlyBZbHLLP6wui0noXjCLLiFWCIMXYXVZTEL3IpquVYh5b76E1WUxCd0LZm5DRg0r5qv5ElaXxSR0L5oZIXVdzHfT4mGAXUST0L1w5kuQLDa55R9Wl8UkdC+YRZcQK4TBi7C6LCahexFN1yrEvDdfwuqymITuBTO3IaOGFfPVfAmry2ISuhfNjJC6Lua7afEwwC6iSeheOPMlSBab3PIPq8ti/x+fz2MKn/O8JAAAAABJRU5ErkJggg==";
            //header("Location: index.php?controleur=controleurMain");

            if (!empty($_FILES["image"])) {
                $imageProfil = $_POST["image"];
                // Enregistrer l'image dans la base de données
                $imageProfil = file_get_contents($_FILES['image']['tmp_name']);
                $imageProfil = base64_encode($imageProfil);

                // Ajouter le nouvel utilisateur
                Utilisateur::ajouteUtilisateur($pseudo, $mdp, $reponse, $imageProfil, $id_QuestionRecup);
                header("Location: index.php?controleur=controleurMain");


            }else {
                Utilisateur::ajouteUtilisateur($pseudo, $mdp, $reponse, $imageProfil, $id_QuestionRecup);
                header("Location: index.php?controleur=controleurMain");

            }
        } else {
           header("Location: index.php?controleur=controleurCreationCompte&action=afficheCreationCompte");
        }


    }


}