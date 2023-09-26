Query 1:
INSERT INTO `clients`(`clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `comment`) 
VALUES ('Tony','Stark','tony@starkent.com,','Iam1ronM@n','"I am the real Ironman"');

Query 2:
UPDATE `clients` 
SET `clientLevel`='3' 
WHERE clientId = 1;

Query 3:
UPDATE inventory 
SET invDescription = REPLACE(invDescription, 'small', 'large')
WHERE invMake = 'GM' AND invModel = 'Hummer';

Query 4:
SELECT i.invMake, i.invModel, c.classificationName
FROM inventory as i
INNER JOIN carclassification as c
ON i.classificationId = c.classificationId
WHERE c.classificationName = 'SUV';

Query 5:
DELETE FROM `inventory` 
WHERE invMake = 'Jeep' AND invModel = 'Wrangler';

Query 6:
UPDATE inventory
SET invImage = CONCAT('/phpmotors', invImage), invThumbnail = CONCAT ('/phpmotors', invThumbnail);

