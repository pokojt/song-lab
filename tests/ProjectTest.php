<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Project.php";

    $server = 'mysql:host=localhost;dbname=songlab_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ProjectTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Project::deleteAll();
        }

        function testGetId()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);

            // Act
            $result = $test_project->getId();

            // Assert
            $this->assertEquals($id, $result);
        }

        function testGetTitle()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);

            // Act
            $result = $test_project->getTitle();

            // Assert
            $this->assertEquals($title, $result);
        }

        function testGetDescription()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);

            // Act
            $result = $test_project->getDescription();

            // Assert
            $this->assertEquals($description, $result);
        }

        function testGetGenre()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);

            // Act
            $result = $test_project->getGenre();

            // Assert
            $this->assertEquals($genre, $result);
        }

        function testGetResources()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);

            // Act
            $result = $test_project->getResources();

            // Assert
            $this->assertEquals($resources, $result);
        }

        function testGetLyrics()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);

            // Act
            $result = $test_project->getLyrics();

            // Assert
            $this->assertEquals($lyrics, $result);
        }

        function testGetType()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);

            // Act
            $result = $test_project->getType();

            // Assert
            $this->assertEquals($type, $result);
        }

        function testSave()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);

            // Act
            $test_project->save();
            $result = Project::getAll();

            // Assert
            $this->assertEquals($test_project, $result[0]);
        }

        function testgetAll()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);

            $title2 = "Dream Song";
            $description2 = "Song about dreams";
            $genre2 = "Drone";
            $resources2 = "http://fakeembedcode.com";
            $lyrics2 = "";
            $type2 = "Lyrics";
            $test_project2 = new Project($id, $title2, $description2, $genre2, $resources2, $lyrics2, $type2);

            // Act
            $test_project->save();
            $test_project2->save();
            $result = Project::getAll();

            // Assert
            $this->assertEquals([$test_project, $test_project2], $result);
        }

        function testFind()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);
            $test_project->save();

            // Act
            $result = Project::find($test_project->getId());

            // Assert
            $this->assertEquals($test_project, $result);
        }

        function testDelete()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);
            $test_project->save();

            $title2 = "Dream Song";
            $description2 = "Song about dreams";
            $genre2 = "Drone";
            $resources2 = "http://fakeembedcode.com";
            $lyrics2 = "";
            $type2 = "Lyrics";
            $test_project2 = new Project($id, $title2, $description2, $genre2, $resources2, $lyrics2, $type2);
            $test_project2->save();

            // Act
            $test_project->delete();
            $result = Project::getAll();

            // Assert
            $this->assertEquals([$test_project2], $result);
        }

        function testUpdate()
        {
            // Arrange
            $id = null;
            $title = "Dream Song";
            $description = "Song about dreams";
            $genre = "Drone";
            $resources = "http://fakeembedcode.com";
            $lyrics = "";
            $type = "Lyrics";
            $test_project = new Project($id, $title, $description, $genre, $resources, $lyrics, $type);
            $test_project->save();

            $new_title = "Song of Dreams";
            $new_description = "Dreamy song";
            $new_genre = "Funk";
            $new_resources = "http://testsite.com";
            $new_lyrics = "These are lyrics for a song";
            $new_type = "Lyrics";

            // Act
            $test_project->update($new_title, $new_description, $new_genre, $new_resources, $new_lyrics, $new_type);
            $result = [$test_project->getTitle(), $test_project->getDescription(), $test_project->getGenre(), $test_project->getResources(), $test_project->getLyrics(), $test_project->getType()];

            // Assert
            $this->assertEquals([$new_title, $new_description, $new_genre, $new_resources, $new_lyrics, $new_type], $result);
        }

    }
?>
