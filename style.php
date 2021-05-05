<style type="text/css">


html{
	scroll-behavior: smooth;
}


.row{
	margin-left:  0!important;
	margin-right:  0!important;
}

*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		
	}

body{
	background: radial-gradient(#333, #013220);
color: #DAA520;
}

section{
	position: relative;
	width: 100%;
	height: 100vh;
	background: radial-gradient(#333, #013220);
    overflow: hidden;
    display: flex;
	justify-content: center;
	align-items: center;	
}

.head_part{
	
	z-index: 1;
}

.cust_head{
	z-index: 1;
}

section .set{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	pointer-events: none;

}

section .set div{
   position: absolute;
   display: block;
}

section .set div:nth-child(1){
   left: 20%;
   animation: animate 10s linear infinite;
   animation-delay: -7s; 
}
section .set div:nth-child(2){
   left: 50%;
   animation: animate 20s linear infinite;
   animation-delay: -5s; 
}
section .set div:nth-child(3){
   left: 70%;
   animation: animate 10s linear infinite;
   animation-delay: 0s; 
}
section .set div:nth-child(4){
   left: 0%;
   animation: animate 10s linear infinite;
   animation-delay: -5s; 
}
section .set div:nth-child(5){
   left: 85%;
   animation: animate 18s linear infinite;
   animation-delay: -10s; 
}
section .set div:nth-child(6){
   left: 0%;
   animation: animate 12s linear infinite;
   
}
section .set div:nth-child(7){
   left: 15%;
   animation: animate 14s linear infinite;
   
}
section .set div:nth-child(8){
   left: 60%;
   animation: animate 10s linear infinite;
   
}

@keyframes animate{

	0%{
		opacity: 0;
		top: -10%;
		transform: translateX(20px) rotate(0deg);
	}
	10%{
		opacity: 1;
	}
	20%{
		transform: translateX(-20px) rotate(45deg);
	}
	40%{
		transform: translateX(-20px) rotate(90deg);
	}
	60%{
		transform: translateX(20px) rotate(180deg);
	}
	80%{
		transform: translateX(-20px) rotate(45deg);
	}
	100%{
		top: 110%;
		transform: translateX(-20px) rotate(225deg);
	}
}

.set1{
	transform: scale(2) rotateY(180deg);
	filter: blur(1px);
}
.set2{
	transform: scale(0.8) rotateX(180deg);
	filter: blur(2px);
}

.brnd_name{
	font-family: 'Goblin One', cursive;
	color: #DAA520;
}

.button{
	position: relative;
	padding: 10px;
    font-size: 17px;
    text-decoration: none;
    color: black;
    background: #DAA520;
    letter-spacing: 1px;
    border: 1px solid  #DAA520;
    transition: 0.5s;
    overflow: hidden;
    border-radius: 5px;
    font-family: 'Cinzel', serif;
}

.button::before{
	content: '';
	position: absolute;
	top: 0;
	left: -100%;
	width: 100%;
	height: 100%;
	background: linear-gradient(90deg,transparent,#fff,transparent);
	transition: 0.5s;
}

.button:hover{
	background: #DAA520;
	box-shadow: 20px 20px 20px 5px rgba(0, 0, 0, 0.9);
}

.button:hover::before{
	left: 100%;
}


.table_style{
	color: #DAA520;
	font-family: 'Volkhov', serif;
}
</style>