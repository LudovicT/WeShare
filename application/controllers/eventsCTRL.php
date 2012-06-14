<?php
if (isset($_POST['create_DateOfEvent']) && !empty($_POST['create_DateOfEvent']) &&
	isset($_POST['create_Address']) && !empty($_POST['create_Address']) &&
	isset($_POST['create_City']) && !empty($_POST['create_City']))
{
	createEvent(getId($user),
				$_POST['create_DateOfEvent'], 
				$_POST['create_Address'],
				$_POST['create_City'],
				2);
}
if (isset($_POST['RefusEvent']) && !empty($_POST['RefusEvent']))
{
	changeStatusEvent($_POST['RefusEvent'], getId($user), '-1');
}
if (isset($_POST['AcceptEvent']) && !empty($_POST['AcceptEvent']))
{
	changeStatusEvent($_POST['AcceptEvent'], getId($user), '1');
}
if (isset($_POST['IsNotSure']) && !empty($_POST['IsNotSure']))
{
	changeStatusEvent($_POST['IsNotSure'], getId($user), '0');
}		
if (isset($_POST['SuppEvent']) && !empty($_POST['SuppEvent']))
{
	deleteEvent($_POST['SuppEvent']);
}
$events = getEvents(getId($user));
$layout = "evenements.php";
if (isset($_GET['action']) && !empty($_GET['action']))
{
	switch ($_GET['action'])
	{
		case "newEvent":
			$layout = "newEvent.php";
			break;
		case "removeEvent":
			if(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
			{
				$IdEvent = $_GET['idEvent'];
				$event = getEvent($IdEvent);
				$layout = "removeEvent.php";
			}
			break;
		case "changeStatusEvent":
			if(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
			{
				$IdEvent = $_GET['idEvent'];
				$event = getEvent($IdEvent);
				$layout = "changeStatusEvent.php";
			}
			break;
		case "manageEvent":
			if(isset($_POST['EditEvent']) && !empty($_POST['EditEvent']))
			{
				editEvent($_POST['EditEvent'], $_POST['modifiy_DateOfEvent'], $_POST['modify_Address'], $_POST['modify_City']);
			}
			if(isset($_POST['InviteFriend']) && !empty($_POST['InviteFriend']) &&
				isset($_POST['IdEvent']) && !empty($_POST['IdEvent']))
			{
				inviteFriendToEvent($_POST['IdEvent'], $_POST['InviteFriend']);
			}
			if(isset($_POST['UninviteFriend']) && !empty($_POST['UninviteFriend']) &&
				isset($_POST['IdEvent']) && !empty($_POST['IdEvent']))
			{
				uninviteFriendFromEvent($_POST['IdEvent'], $_POST['UninviteFriend']);
			}
					if(isset($_POST['SuppMovie']) && !empty($_POST['SuppMovie']) &&
				isset($_POST['IdEvent']) && !empty($_POST['IdEvent']))
			{
				removeMovieFromEvent($_POST['IdEvent'], $_POST['SuppMovie']);
			}
			if(isset($_POST['AddMovie']) && !empty($_POST['AddMovie']) &&
				isset($_POST['IdEvent']) && !empty($_POST['IdEvent']))
			{
				addMovieToEvent($_POST['IdEvent'], $_POST['AddMovie']);
			}
			if(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
			{
				$IdEvent = $_GET['idEvent'];
				$event = getEvent($IdEvent);
				$movies = getMovieEvent($IdEvent);
				$friends = getFriendsEvent($IdEvent);
				$layout = "manageEvent.php";
			}
			if (isset($_GET['do']) && $_GET['do'] == 'inviteFriendToEvent')
			{
				if(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
				{
					$IdEvent = $_GET['idEvent'];
					$UserFriends = getFriends(getId($user));
					$layout = "inviteFriendToEvent.php";
				}
			}
			if (isset($_GET['do']) && $_GET['do'] == 'uninviteFriendFromEvent')
			{
				if(isset($_GET['IdUser']) && !empty($_GET['IdUser']))
				{
					$IdUser = $_GET['IdUser'];
					$IdEvent = $_GET['idEvent'];
					$pseudo = getPseudo($IdUser);
					$layout = "uninviteFriendFromEvent.php";
				}
			}
			if (isset($_GET['do']) && $_GET['do'] == 'removeMovieFromEvent')
			{
				if(isset($_GET['IdMovie']) && !empty($_GET['IdMovie']))
				{
					$IdMovie = $_GET['IdMovie'];
					$IdEvent = $_GET['idEvent'];
					$movie = getMovie($IdMovie);
					$layout = "removeMovieFromEvent.php";
				}
			}
			if (isset($_GET['do']) && $_GET['do'] == 'addMovieToEvent')
			{
				if(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
				{
					$IdEvent = $_GET['idEvent'];
					$rawUserMovies = getUserMovies(getId($user));
					foreach ($rawUserMovies as $key)
					{
						$UserMovies[] = getMovie($key['IdMovie']);
					}
					$layout = "addMovieToEvent.php";
				}
			}
			break;
			case "editEvent":
			if(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
			{
				$IdEvent = $_GET['idEvent'];
				$event = getEvent($IdEvent);
				$layout = "editEvent.php";
			}
			break;
			case "viewEvent":
			if (isset($_POST['For']) && !empty($_POST['For']))
			{
				addVoteMovieEvent($_POST['IdEvent'], $_POST['For'], $userId, 1);
			}
			if (isset($_POST['Against']) && !empty($_POST['Against']))
			{
				addVoteMovieEvent($_POST['IdEvent'], $_POST['Against'], $userId, -1);
			}
			if (isset($_GET['do']) && $_GET['do'] == 'voteFilmEvent')
			{
				if(isset($_GET['IdMovie']) && !empty($_GET['IdMovie']))
				{
					$IdMovie = $_GET['IdMovie'];
					$IdEvent = $_GET['idEvent'];
					$movie = getMovie($IdMovie);
					$layout = "voteFilmEvent.php";
				}
			}
			elseif(isset($_GET['idEvent']) && !empty($_GET['idEvent']))
			{
				$IdEvent = $_GET['idEvent'];
				$event = getEvent($IdEvent);
				$movies = getMovieEvent($IdEvent);
				$i = 0;
				if ($movies != -2)
				{
					foreach($movies as $key)
					{
						$movies[$i]['NbVote'] = getPollMovieEvent($IdEvent, $key['IdMovie']);
						$movies[$i]['CheckVote'] = checkVoteMovieEvent($IdEvent, $key['IdMovie'], $userId);
						$i++;
					}
				}
				$friends = getFriendsEvent($IdEvent);
				$layout = "viewEvent.php";
			}
			break;
		default:
		$layout = "erreur.php"; 
	}
}
?>