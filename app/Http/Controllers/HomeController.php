<?php

namespace App\Http\Controllers;

use App\Models\Blotter;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function getStopWords()
    {
        $stopwords = ["The", "i", "said", "me", "my", "myself", "we", "our", "ours", "ourselves", "you", "your", "yours", "yourself", "yourselves", "he", "him", "his", "himself", "she", "her", "hers", "herself", "it", "its", "itself", "they", "them", "their", "theirs", "themselves", "what", "which", "who", "whom", "this", "that", "these", "those", "am", "is", "are", "was", "were", "be", "been", "being", "have", "has", "had", "having", "do", "does", "did", "doing", "a", "an", "the", "and", "but", "if", "or", "because", "as", "until", "while", "of", "at", "by", "for", "with", "about", "against", "between", "into", "through", "during", "before", "after", "above", "below", "to", "from", "up", "down", "in", "out", "on", "off", "over", "under", "again", "further", "then", "once", "here", "there", "when", "where", "why", "how", "all", "any", "both", "each", "few", "more", "most", "other", "some", "such", "no", "nor", "not", "only", "own", "same", "so", "than", "too", "very", "s", "t", "can", "will", "just", "don", "should", "now",
        "Manila", "Philippines", "akin","aking","ako","alin","am","amin","aming","ang","ano","anumang","apat","at","atin","ating","ay","bababa","bago","bakit","bawat","bilang","dahil","dalawa","dapat","din","dito","doon","gagawin","gayunman","ginagawa","ginawa","ginawang","gumawa","gusto","habang","hanggang","hindi","huwag","iba","ibaba","ibabaw","ibig","ikaw","ilagay","ilalim","ilan","inyong","isa","isang","itaas","ito","iyo","iyon","iyong","ka","kahit","kailangan","kailanman","kami","kanila","kanilang","kanino","kanya","kanyang","kapag","kapwa","karamihan","katiyakan","katulad","kaya","kaysa","ko","kong","kulang","kumuha","kung","laban","lahat","lamang","likod","lima","maaari","maaaring","maging","mahusay","makita","marami","marapat","masyado","may","mayroon","mga","minsan","mismo","mula","muli","na","nabanggit","naging","nagkaroon","nais","nakita","namin","napaka","narito","nasaan","ng","ngayon","ni","nila","nilang","nito","niya","niyang","noon","o","pa","paano","pababa","paggawa","pagitan","pagkakaroon","pagkatapos","palabas","pamamagitan","panahon","pangalawa","para","paraan","pareho","pataas","pero","pumunta","pumupunta","sa","saan","sabi","sabihin","sarili","sila","sino","siya","tatlo","tayo","tulad","tungkol","una","walang"];

        return $stopwords;
    }

    function clean_stopword($string, $stopword)
    {
        $string = preg_replace('/\b(' . implode('|', $stopword) . ')\b/', '', $string);
        $string = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $string)));

        return $string;
    }

    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->user_type_id == '1' || Auth::user()->user_type_id == 2) {
                $data = Blotter::select('case_no', 'created_at')->orderBy('created_at')->get()->groupBy(function ($data) {
                    return Carbon::parse($data->created_at)->format('M');
                });

                $months = [];
                $monthCount = [];
                foreach ($data as $month => $values) {
                    $months[] = $month;
                    $monthCount[] = count($values);
                }

                // $incident_data = Report::select('street', 'created_at')->orderBy('created_at')->get()->groupBy(function($incident_data){
                //     return Carbon::parse($incident_data->created_at)->format('Y-m-d');
                // });

                // $dates=[];
                // $dateCount=[];
                // foreach($incident_data as $date => $values){
                //     $dates[]=$date;
                //     $dateCount[]=count($values);
                // }

                //arlegui
                $report_arlegui = Report::select('street', 'created_at')->where('street', 'Arlegui St.')->orderBy('created_at')->get()->groupBy(function ($incident_data) {
                    return Carbon::parse($incident_data->created_at)->format('Y-m-d');
                });
                $dates_ar = [];
                $dateCount_ar = [];
                foreach ($report_arlegui as $date => $values) {
                    $dates_ar[] = $date;
                    $dateCount_ar[] = count($values);
                }

                //castillejos
                $report_castillejos = Report::select('street', 'created_at')->where('street', 'Castillejos St.')->orderBy('created_at')->get()->groupBy(function ($incident_data) {
                    return Carbon::parse($incident_data->created_at)->format('Y-m-d');
                });
                $dates_cas = [];
                $dateCount_cas = [];
                foreach ($report_castillejos as $date => $values) {
                    $dates_cas[] = $date;
                    $dateCount_cas[] = count($values);
                }

                //duque
                $report_duque = Report::select('street', 'created_at')->where('street', 'Duque St.')->orderBy('created_at')->get()->groupBy(function ($incident_data) {
                    return Carbon::parse($incident_data->created_at)->format('Y-m-d');
                });
                $dates_duq = [];
                $dateCount_duq = [];
                foreach ($report_duque as $date => $values) {
                    $dates_duq[] = $date;
                    $dateCount_duq[] = count($values);
                }

                //farnecio
                $report_farnecio = Report::select('street', 'created_at')->where('street', 'Farnecio St.')->orderBy('created_at')->get()->groupBy(function ($incident_data) {
                    return Carbon::parse($incident_data->created_at)->format('Y-m-d');
                });
                $dates_far = [];
                $dateCount_far = [];
                foreach ($report_farnecio as $date => $values) {
                    $dates_far[] = $date;
                    $dateCount_far[] = count($values);
                }

                //fraternal
                $report_fraternal = Report::select('street', 'created_at')->where('street', 'Fraternal St.')->orderBy('created_at')->get()->groupBy(function ($incident_data) {
                    return Carbon::parse($incident_data->created_at)->format('Y-m-d');
                });
                $dates_fra = [];
                $dateCount_fra = [];
                foreach ($report_fraternal as $date => $values) {
                    $dates_fra[] = $date;
                    $dateCount_fra[] = count($values);
                }

                //p casal
                $report_pcasal = Report::select('street', 'created_at')->where('street', 'Pascual Casal St.')->orderBy('created_at')->get()->groupBy(function ($incident_data) {
                    return Carbon::parse($incident_data->created_at)->format('Y-m-d');
                });
                $dates_pcasal = [];
                $dateCount_pcasal = [];
                foreach ($report_pcasal as $date => $values) {
                    $dates_pcasal[] = $date;
                    $dateCount_pcasal[] = count($values);
                }

                //pax 
                $report_pax = Report::select('street', 'created_at')->where('street', 'Pax St.')->orderBy('created_at')->get()->groupBy(function ($incident_data) {
                    return Carbon::parse($incident_data->created_at)->format('Y-m-d');
                });
                $dates_pax = [];
                $dateCount_pax = [];
                foreach ($report_pax as $date => $values) {
                    $dates_pax[] = $date;
                    $dateCount_pax[] = count($values);
                }

                //vergara 
                $report_ver = Report::select('street', 'created_at')->where('street', 'Vergara St.')->orderBy('created_at')->get()->groupBy(function ($incident_data) {
                    return Carbon::parse($incident_data->created_at)->format('Y-m-d');
                });
                $dates_ver = [];
                $dateCount_ver = [];
                foreach ($report_ver as $date => $values) {
                    $dates_ver[] = $date;
                    $dateCount_ver[] = count($values);
                }

                // # of report per type
                $report_types = Report::select('type')->orderBy('type')->get()->groupBy('type');
                $types = [];
                $typeCount = [];
                foreach ($report_types as $type => $values) {
                    $types[] = $type;
                    $typeCount[] = count($values);
                }

                //dougnut
                $report_count = Report::count();

                //wordcloud
                $blotter = Blotter::select('complaint_desc')->get()->groupBy('complaint_desc');
                $complaint_desc = [];
                foreach ($blotter as $type => $values) {
                    $complaint_desc[] = $type;
                }

                
                //$str_CD = htmlspecialchars(json_encode($complaint_desc), ENT_QUOTES, "UTF-8");
                $str_CD = json_encode($complaint_desc);
                $stop_words = $this->getStopWords();
                $cleanedText = $this->clean_stopword($str_CD, $stop_words);


                //ongoing blotter cases
                

                //dd($cleanedText);

                return view('admin.home', [
                    'data' => $data,
                    'months' => $months,
                    'monthCount' => $monthCount,
                    'dates_ar' => $dates_ar,
                    'dateCount_ar' => $dateCount_ar,
                    'dates_cas' => $dates_cas,
                    'dateCount_cas' => $dateCount_cas,
                    'dates_duq' => $dates_duq,
                    'dateCount_duq' => $dateCount_duq,
                    'dates_far' => $dates_far,
                    'dateCount_far' => $dateCount_far,
                    'dates_fra' => $dates_fra,
                    'dateCount_fra' => $dateCount_fra,
                    'dates_pcasal' => $dates_pcasal,
                    'dateCount_pcasal' => $dateCount_pcasal,
                    'dates_pax' => $dates_pax,
                    'dateCount_pax' => $dateCount_pax,
                    'dates_ver' => $dates_ver,
                    'dateCount_ver' => $dateCount_ver,
                    'types' => $types,
                    'typeCount' => $typeCount,
                    'report_count' => $report_count,
                    'complaint_desc' => $complaint_desc,
                    'cleanedText' => $cleanedText,
                ]);
            } else {
                return view('user.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        return view('user.home');
    }
}
