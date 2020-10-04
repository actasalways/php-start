<?php 

declare(strict_types=1);


    function sum($num1,$num2)
    {
        return $num1+$num2;
    }
    #echo sum(1,2);


    $name = "Erdem";
    function addSurname($surname)
    {
        //$GLOBALS['name]
        global $name;
        #return $name .' ' .$surname ; 
        return $GLOBALS['name'].' '. $surname;
    }
    #echo addSurname('Bektaş');
    

    $input = "erdem bektaş erdem bektaş";
    #echo substr($input, 0, 10) . '...';

    function shortening($str, $limit = 10)
    {
        $characterLenght=strlen($str);
        if($characterLenght > $limit ){
            $str = substr($str, 0 , $limit) . '...' ; 
        }
        return $str;
    }
    #echo shortening($input, 5);


#anonymous functions 

$test = function($param){
    return 'test ' .$param ;
};
#echo $test('Erdem');

$test = function ($par)
{
    return 'test '.$par;
};

$test2 = function () use ($test)
{
    return 'test2 '. $test('hi');
};

#echo $test2();


$arr = [
    function ()
    {
        return '1. func';
    },
    function ()
    {
        return '2. func';
    },
    function ()
    {
        return '3. func';
    }
];


#echo $arr[0]();
$isIt="is it?";

function filter($name)
{
    global $isIt;
    return $name .' ' .$isIt; 
}

$arr = ['Erdem','Bektaş','Developer'];
$arr = array_map(function($name) use($isIt){
    return $name .' ' .$isIt; 
},$arr);
#print_r($arr);

/*
    func_num_args()
    func_get_args()
    func_get_arg()
*/

function test(){
    echo func_num_args() .'<br>' ;
    print_r(func_get_args());
    echo '<br>' .func_get_arg(1);
}

#test('erdem','coding','sport');

#Recursive Functions 

function counting($numb){
    echo $numb ;
    if($numb<10){
        counting($numb+1);
    }
}
#counting(1);

$categories = [
    [
        'id' => 1,
        'parent' => 0,
        'name' => 'Lessons'
    ],
    [
        'id' => 2,
        'parent' => 0,
        'name' => 'actual'
    ],
    [
        'id' => 3,
        'parent' => 0,
        'name' => 'Blog'
    ],
    [
        'id' => 4,
        'parent' => 1,
        'name' => 'PHP Lessons'
    ],
    [
        'id' => 5,
        'parent' => 1,
        'name' => 'CSS Lessons'
    ]
];

function getCategories($categories,$parent = 0){
    $html = '';
    $html .= '<ul>';
    foreach ($categories as $category) {
        if($category['parent']==$parent){
            $html .= '<li>' .$category['name'];
            $html .= getCategories($categories,$category['id']);
            $html .= '</li>';
        }
    }
    $html .= '</ul>';
    return $html;
}

#echo getCategories($categories);

$arr =[
    'name' =>'Erdem',
    'surname' => 'Bektaş',
    'sports' => [
        'running' => 'yes',
        'martial_arts' => [
            'judo' => 'no',
            'aikido'=> 'no',
            'taelwondo' => 'yes',
            'kickbox' => 'yes',
        ],
        'swimming' => 'yes',
        ]
];

function find($series,$getKey)
{
    foreach($series as $key => $val){
        if($key == $getKey){
            return $val;
        }
        if(is_array($val)){
            $result = find($val,$getKey);
            if($result){
                return $result;
            }
        }
    }
    return false;
}
 
#echo find($arr,'');
#print_r(find($arr,'martial_arts'));


#function_exists()

function funcExist(){
    return 'function exist';
}
/*
if(function_exists('funcExist')){
    echo 'function exist';
}else{
    echo 'function not exist';
}
*/

/* yield
    range(0,10000);
*/

function countt($start, $limit){
    for ($i=$start; $i < $limit; $i++) { 
        yield $i;
    }
}

$numbers = countt(0,10000);
foreach($numbers as $number){
    #echo $number .'<br>';
}


#statics 

function countIt(){
    static $numbe=1;
    echo $numbe .'<br>';
    $numbe++;
}

function loadd($valu){
    static $uploads = [];
    $uploads [] = $valu;
    return $uploads;
}

loadd('test.php');
loadd('a.php');
$uploads = loadd('b.php');

#print_r($uploads);

/*param type 
declare(strict_types=1); 
must be at the top of the page 
*/

function sums(int $numb1, int $numb2) : string {
    return (string) ($numb1 + $numb2);
}
#echo sums(5,3);

function arr(array $arr) : string {
    return implode(',',$arr);
}

print_r(arr(["test","test2"]));



?>
