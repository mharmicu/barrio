<?php

namespace App\Http\Controllers;

use App\Models\Blotter;
use App\Models\CaseHearing;
use App\Models\CourtAction;
use App\Models\Hearing;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function getStopWords()
    {
        $stopwords = [
            "The", "i", "said", "me", "my", "myself", "we", "our", "ours", "ourselves", "you", "your", "yours", "yourself", "yourselves", "he", "him", "his", "himself", "she", "her", "hers", "herself", "it", "its", "itself", "they", "them", "their", "theirs", "themselves", "what", "which", "who", "whom", "this", "that", "these", "those", "am", "is", "are", "was", "were", "be", "been", "being", "have", "has", "had", "having", "do", "does", "did", "doing", "a", "an", "the", "and", "but", "if", "or", "because", "as", "until", "while", "of", "at", "by", "for", "with", "about", "against", "between", "into", "through", "during", "before", "after", "above", "below", "to", "from", "up", "down", "in", "out", "on", "off", "over", "under", "again", "further", "then", "once", "here", "there", "when", "where", "why", "how", "all", "any", "both", "each", "few", "more", "most", "other", "some", "such", "no", "nor", "not", "only", "own", "same", "so", "than", "too", "very", "s", "t", "can", "will", "just", "don", "should", "now",
            "Manila", "Philippines", "akin", "aking", "ako", "alin", "am", "amin", "aming", "ang", "ano", "anumang", "apat", "at", "atin", "ating", "ay", "bababa", "bago", "bakit", "bawat", "bilang", "dahil", "dalawa", "dapat", "din", "dito", "doon", "gagawin", "gayunman", "ginagawa", "ginawa", "ginawang", "gumawa", "gusto", "habang", "hanggang", "hindi", "huwag", "iba", "ibaba", "ibabaw", "ibig", "ikaw", "ilagay", "ilalim", "ilan", "inyong", "isa", "isang", "itaas", "ito", "iyo", "iyon", "iyong", "ka", "kahit", "kailangan", "kailanman", "kami", "kanila", "kanilang", "kanino", "kanya", "kanyang", "kapag", "kapwa", "karamihan", "katiyakan", "katulad", "kaya", "kaysa", "ko", "kong", "kulang", "kumuha", "kung", "laban", "lahat", "lamang", "likod", "lima", "maaari", "maaaring", "maging", "mahusay", "makita", "marami", "marapat", "masyado", "may", "mayroon", "mga", "minsan", "mismo", "mula", "muli", "na", "nabanggit", "naging", "nagkaroon", "nais", "nakita", "namin", "napaka", "narito", "nasaan", "ng", "ngayon", "ni", "nila", "nilang", "nito", "niya", "niyang", "noon", "o", "pa", "paano", "pababa", "paggawa", "pagitan", "pagkakaroon", "pagkatapos", "palabas", "pamamagitan", "panahon", "pangalawa", "para", "paraan", "pareho", "pataas", "pero", "pumunta", "pumupunta", "sa", "saan", "sabi", "sabihin", "sarili", "sila", "sino", "siya", "tatlo", "tayo", "tulad", "tungkol", "una", "walang"
        ];

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
                $case_hearing = array();
                $blotter = array();
                $hearings = array();

                $data = Blotter::latest()->get();
                $chs = CaseHearing::latest()->get()->unique('case_no');

                foreach ($data as $d) {
                    if (!$chs->contains('case_no', $d->case_no)) {
                        $blotter[] = Blotter::where('case_no', $d->case_no)->first();
                    }
                }
                foreach ($chs as $c) {
                    $hearings[] = Hearing::where('hearing_id', $c->hearing_id)->first();
                }

                foreach ($hearings as $h) {
                    if (!$h->settlement_id && !$h->award_id) {
                        $case_hearing[] = CaseHearing::where('hearing_id', $h->hearing_id)->first();
                    }
                }

                foreach ($case_hearing as $ch) {
                    $blotter[] = Blotter::where('case_no', $ch->case_no)->latest()->first();
                }

                //blotter
                $currentCountBlotter = Blotter::count();
                $todayCountBlotter = count(Blotter::whereDate('created_at', Carbon::today())->get());
                $weekCountBlotter = count(Blotter::whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])->get());
                $monthCountBlotter = count(Blotter::whereMonth('created_at', Carbon::now()->month)->get());

                //settled cases
                $case_hearing = CaseHearing::all();
                $data = array();
                $hearings = array();

                foreach ($case_hearing as $ch) {
                    $hearings[] = Hearing::where('hearing_id', $ch->hearing_id)->first();
                }

                foreach ($case_hearing as $key => $value) {
                    if ($hearings[$key]->settlement_id || $hearings[$key]->award_id) {
                        $data[] = Blotter::where('blotter_report.case_no', $value->case_no)->first();
                    }
                }
                $settledCases = count($data);
                $unsettledCases = count($blotter);
                $courtAction = count(CourtAction::get());


                //HEARINGS

                //med
                $mediation_hearing = array();
                $blotter_report_med = array();
                $case_hearing = array();
                $all_case_hearing = DB::select('SELECT * FROM case_hearings WHERE id IN (SELECT MAX(id) FROM case_hearings GROUP BY case_no)');

                foreach ($all_case_hearing as $ch) {
                    $mediation_hearing[] = Hearing::where('hearing_id', $ch->hearing_id)->where('hearing_type_id', 1)->whereNull('settlement_id')->first();
                }
                foreach ($mediation_hearing as $mediation) {
                    if ($mediation) {
                        $case_hearing[] = CaseHearing::where('hearing_id', $mediation->hearing_id)->first();
                    }
                }
                foreach ($case_hearing as $c) {
                    $court_action = CourtAction::where('case_no', $c->case_no)->first();
                    if (!$court_action) {
                        $blotter_report_med[] = Blotter::where('case_no', $c->case_no)->first();
                    }
                }


                //con
                $conciliation_hearing = array();
                $blotter_report_con = array();
                $case_hearing = array();
                $all_case_hearing = DB::select('SELECT * FROM case_hearings WHERE id IN (SELECT MAX(id) FROM case_hearings GROUP BY case_no)');

                foreach ($all_case_hearing as $ch) {
                    $conciliation_hearing[] = Hearing::where('hearing_id', $ch->hearing_id)->where('hearing_type_id', 2)->whereNull('settlement_id')->first();
                }
                foreach ($conciliation_hearing as $conciliation) {
                    if ($conciliation) {
                        $case_hearing[] = CaseHearing::where('hearing_id', $conciliation->hearing_id)->first();
                    }
                }
                foreach ($case_hearing as $c) {
                    $court_action = CourtAction::where('case_no', $c->case_no)->first();
                    if (!$court_action) {
                        $blotter_report_con[] = Blotter::where('case_no', $c->case_no)->first();
                    }
                }


                //arb
                $arbitration_hearing = Hearing::where('hearing_type_id', 3)->whereNull('award_id')->get();
                $blotter_report_arb = array();
                foreach ($arbitration_hearing as $arbitration) {
                    $case_hearing = CaseHearing::where('hearing_id', $arbitration->hearing_id)->first();

                    $court_action = CourtAction::where('case_no', $case_hearing->case_no)->first();
                    if (!$court_action) {
                        $blotter_report_arb[] = Blotter::where('case_no', $case_hearing->case_no)->first();
                    }
                }


                //mediationCount
                $mediationCount = count($blotter_report_med);
                //conciliationCount
                $conciliationCount = count($blotter_report_con);
                //arbitrationCount
                $arbitrationCount = count($blotter_report_arb);






                //incident reports
                $currentCountIncident = Report::count();
                $todayCountIncident = count(Report::whereDate('created_at', Carbon::today())->get());
                $weekCountIncident = count(Report::whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])->get());
                $monthCountIncident = count(Report::whereMonth('created_at', Carbon::now()->month)->get());

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
                    'currentCountBlotter' => $currentCountBlotter,
                    'todayCountBlotter' => $todayCountBlotter,
                    'weekCountBlotter' => $weekCountBlotter,
                    'monthCountBlotter' => $monthCountBlotter,
                    'currentCountIncident' => $currentCountIncident,
                    'todayCountIncident' => $todayCountIncident,
                    'weekCountIncident' => $weekCountIncident,
                    'monthCountIncident' => $monthCountIncident,
                    'settledCases' => $settledCases,
                    'unsettledCases' => $unsettledCases,
                    'courtAction' => $courtAction,
                    'mediationCount' => $mediationCount,
                    'conciliationCount' => $conciliationCount,
                    'arbitrationCount' => $arbitrationCount,
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
