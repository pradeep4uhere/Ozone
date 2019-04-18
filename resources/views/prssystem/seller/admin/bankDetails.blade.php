                    <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
                    @if(Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                    @if(Session::has('error'))
                    <p class="alert alert-danger">
                    @foreach(Session::get('error') as $err)
                    {{ $err }}</br>
                    @endforeach
                    </p>
                    @endif
                    
                    <form method="post" action="{{route('updateBank')}}"class="form-horizontal" >
                    {{csrf_field()}}
                    
                   
                    
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="disabledinput" class="control-label">@lang('Account Holder Name:')</label>
                            <input  type="text" class="form-control1 datepicker" name="account_holder_name" placeholder="Enter Account Holder Name" value="{{$seller->account_holder_name}}">
                        </div> 
                       
                       
                    </div>
                    <div class="form-group">
                        
                        <div class="col-sm-4">
                        <label for="disabledinput" class="control-label">@lang('Bank Name:')</label>
                        <select name="bank_name"  class="form-control1">
                        <?php if($seller->bank_name!=''){ ?>
                        <option value="{{$seller->bank_name}}" selected="selected">{{str_replace("_"," ",$seller->bank_name)}}</option>
                        <?php }else{ ?>
                            <option value="" selected="selected">Select Bank Name</option>
                        <?php }?>
                        
                        <option value="ABHYUDAYA_CO-OP_BANK_LTD">ABHYUDAYA CO-OP BANK LTD</option>
                        <option value="ABU_DHABI_COMMERCIAL_BANK">ABU DHABI COMMERCIAL BANK</option>
                        <option value="AKOLA_DISTRICT_CENTRAL_CO-OPERATIVE_BANK">AKOLA DISTRICT CENTRAL CO-OPERATIVE BANK</option>
                        <option value="AKOLA_JANATA_COMMERCIAL_COOPERATIVE_BANK">AKOLA JANATA COMMERCIAL COOPERATIVE BANK</option>
                        <option value="ALLAHABAD_BANK">ALLAHABAD BANK</option>
                        <option value="ALMORA_URBAN_CO-OPERATIVE_BANK_LTD.">ALMORA URBAN CO-OPERATIVE BANK LTD.</option>
                        <option value="ANDHRA_PRAGATHI_GRAMEENA_BANK">ANDHRA PRAGATHI GRAMEENA BANK</option>
                        <option value="APNA_SAHAKARI_BANK_LTD">APNA SAHAKARI BANK LTD</option>
                        <option value="AUSTRALIA_AND_NEW_ZEALAND_BANKING_GROUP_LIMITED.">AUSTRALIA AND NEW ZEALAND BANKING GROUP LIMITED.</option>
                        <option value="AXIS_BANK">AXIS BANK</option>
                        <option value="BANK_INTERNASIONAL_INDONESIA">BANK INTERNASIONAL INDONESIA</option>
                        <option value="BANK_OF_AMERICA">BANK OF AMERICA</option>
                        <option value="BANK_OF_BAHRAIN_AND_KUWAIT_">BANK OF BAHRAIN AND KUWAIT</option>
                        <option value="BANK_OF_BARODA">BANK OF BARODA</option>
                        <option value="BANK_OF_CEYLON">BANK OF CEYLON</option>
                        <option value="BANK_OF_INDIA">BANK OF INDIA</option>
                        <option value="BANK_OF_MAHARASHTRA">BANK OF MAHARASHTRA</option>
                        <option value="BANK_OF_TOKYO-MITSUBISHI_UFJ_LTD.">BANK OF TOKYO-MITSUBISHI UFJ LTD.</option>
                        <option value="BARCLAYS_BANK_PLC">BARCLAYS BANK PLC</option>
                        <option value="BASSEIN_CATHOLIC_CO-OP_BANK_LTD">BASSEIN CATHOLIC CO-OP BANK LTD</option>
                        <option value="BHARATIYA_MAHILA_BANK_LIMITED">BHARATIYA MAHILA BANK LIMITED</option>
                        <option value="BNP_PARIBAS">BNP PARIBAS</option>
                        <option value="CALYON_BANK">CALYON BANK</option>
                        <option value="CANARA_BANK">CANARA BANK</option>
                        <option value="CAPITAL_LOCAL_AREA_BANK_LTD.">CAPITAL LOCAL AREA BANK LTD.</option>
                        <option value="CATHOLIC_SYRIAN_BANK_LTD.">CATHOLIC SYRIAN BANK LTD.</option>
                        <option value="CENTRAL_BANK_OF_INDIA">CENTRAL BANK OF INDIA</option>
                        <option value="CHINATRUST_COMMERCIAL_BANK">CHINATRUST COMMERCIAL BANK</option>
                        <option value="CITIBANK_NA">CITIBANK NA</option>
                        <option value="CITIZENCREDIT_CO-OPERATIVE_BANK_LTD">CITIZENCREDIT CO-OPERATIVE BANK LTD</option>
                        <option value="CITY_UNION_BANK_LTD">CITY UNION BANK LTD</option>
                        <option value="COMMONWEALTH_BANK_OF_AUSTRALIA">COMMONWEALTH BANK OF AUSTRALIA</option>
                        <option value="CORPORATION_BANK">CORPORATION BANK</option>
                        <option value="CREDIT_SUISSE_AG">CREDIT SUISSE AG</option>
                        <option value="DBS_BANK_LTD">DBS BANK LTD</option>
                        <option value="DENA_BANK">DENA BANK</option>
                        <option value="DEUTSCHE_BANK">DEUTSCHE BANK</option>
                        <option value="DEVELOPMENT_CREDIT_BANK_LIMITED">DEVELOPMENT CREDIT BANK LIMITED</option>
                        <option value="DHANLAXMI_BANK_LTD">DHANLAXMI BANK LTD</option>
                        <option value="DICGC">DICGC</option>
                        <option value="DOMBIVLI_NAGARI_SAHAKARI_BANK_LIMITED">DOMBIVLI NAGARI SAHAKARI BANK LIMITED</option>
                        <option value="FIRSTRAND_BANK_LIMITED">FIRSTRAND BANK LIMITED</option>
                        <option value="GOPINATH_PATIL_PARSIK_JANATA_SAHAKARI_BANK_LTD">GOPINATH PATIL PARSIK JANATA SAHAKARI BANK LTD</option>
                        <option value="GURGAON_GRAMIN_BANK">GURGAON GRAMIN BANK</option>
                        <option value="HDFC_BANK_LTD">HDFC BANK LTD</option>
                        <option value="HSBC">HSBC</option>
                        <option value="ICICI_BANK_LTD">ICICI BANK LTD</option>
                        <option value="IDBI_BANK_LTD">IDBI BANK LTD</option>
                        <option value="IDRBT">IDRBT</option>
                        <option value="INDIAN_BANK">INDIAN BANK</option>
                        <option value="INDIAN_OVERSEAS_BANK">INDIAN OVERSEAS BANK</option>
                        <option value="INDUSTRIAL_AND_COMMERCIAL_BANK_OF_CHINA_LIMITED">INDUSTRIAL AND COMMERCIAL BANK OF CHINA LIMITED</option>
                        <option value="INDUSIND_BANK_LTD">INDUSIND BANK LTD</option>
                        <option value="ING_VYSYA_BANK_LTD">ING VYSYA BANK LTD</option>
                        <option value="JALGAON_JANATA_SAHKARI_BANK_LTD">JALGAON JANATA SAHKARI BANK LTD</option>
                        <option value="JANAKALYAN_SAHAKARI_BANK_LTD">JANAKALYAN SAHAKARI BANK LTD</option>
                        <option value="JANASEVA_SAHAKARI_BANK_LTD._PUNE">JANASEVA SAHAKARI BANK LTD. PUNE</option>
                        <option value="JANASEVA_SAHAKARI_BANK_(BORIVLI)_LTD">JANASEVA SAHAKARI BANK (BORIVLI) LTD</option>
                        <option value="JANATA_SAHAKARI_BANK_LTD_(PUNE)">JANATA SAHAKARI BANK LTD (PUNE)</option>
                        <option value="JPMORGAN_CHASE_BANK_N.A">JPMORGAN CHASE BANK N.A</option>
                        <option value="KALLAPPANNA_AWADE_ICH_JANATA_S_BANK">KALLAPPANNA AWADE ICH JANATA S BANK</option>
                        <option value="KAPOL_CO_OP_BANK">KAPOL CO OP BANK</option>
                        <option value="KARNATAKA_BANK_LTD">KARNATAKA BANK LTD</option>
                        <option value="KARNATAKA_VIKAS_GRAMEENA_BANK">KARNATAKA VIKAS GRAMEENA BANK</option>
                        <option value="KARUR_VYSYA_BANK">KARUR VYSYA BANK</option>
                        <option value="KOTAK_MAHINDRA_BANK">KOTAK MAHINDRA BANK</option>
                        <option value="KURMANCHAL_NAGAR_SAHKARI_BANK_LTD">KURMANCHAL NAGAR SAHKARI BANK LTD</option>
                        <option value="MAHANAGAR_CO-OP_BANK_LTD">MAHANAGAR CO-OP BANK LTD</option>
                        <option value="MAHARASHTRA_STATE_CO_OPERATIVE_BANK">MAHARASHTRA STATE CO OPERATIVE BANK</option>
                        <option value="MASHREQBANK_PSC">MASHREQBANK PSC</option>
                        <option value="MIZUHO_CORPORATE_BANK_LTD">MIZUHO CORPORATE BANK LTD</option>
                        <option value="MUMBAI_DISTRICT_CENTRAL_CO-OP._BANK_LTD.">MUMBAI DISTRICT CENTRAL CO-OP. BANK LTD.</option>
                        <option value="NAGPUR_NAGRIK_SAHAKARI_BANK_LTD">NAGPUR NAGRIK SAHAKARI BANK LTD</option>
                        <option value="NATIONAL_AUSTRALIA_BANK">NATIONAL AUSTRALIA BANK</option>
                        <option value="NEW__INDIA_CO-OPERATIVE__BANK__LTD.">NEW  INDIA CO-OPERATIVE  BANK  LTD.</option>
                        <option value="NKGSB_CO-OP_BANK_LTD">NKGSB CO-OP BANK LTD</option>
                        <option value="NORTH_MALABAR_GRAMIN_BANK">NORTH MALABAR GRAMIN BANK</option>
                        <option value="NUTAN_NAGARIK_SAHAKARI_BANK_LTD">NUTAN NAGARIK SAHAKARI BANK LTD</option>
                        <option value="OMAN_INTERNATIONAL_BANK_SAOG">OMAN INTERNATIONAL BANK SAOG</option>
                        <option value="ORIENTAL_BANK_OF_COMMERCE">ORIENTAL BANK OF COMMERCE</option>
                        <option value="PARSIK_JANATA_SAHAKARI_BANK_LTD">PARSIK JANATA SAHAKARI BANK LTD</option>
                        <option value="PRATHAMA_BANK">PRATHAMA BANK</option>
                        <option value="PRIME_CO_OPERATIVE_BANK_LTD_">PRIME CO OPERATIVE BANK LTD</option>
                        <option value="PUNJAB_AND_MAHARASHTRA_CO-OP_BANK_LTD.">PUNJAB AND MAHARASHTRA CO-OP BANK LTD.</option>
                        <option value="PUNJAB_AND_SIND_BANK">PUNJAB AND SIND BANK</option>
                        <option value="PUNJAB_NATIONAL_BANK">PUNJAB NATIONAL BANK</option>
                        <option value="RABOBANK_INTERNATIONAL_(CCRB)">RABOBANK INTERNATIONAL (CCRB)</option>
                        <option value="RAJGURUNAGAR_SAHAKARI_BANK_LTD.">RAJGURUNAGAR SAHAKARI BANK LTD.</option>
                        <option value="RAJKOT_NAGARIK_SAHAKARI_BANK_LTD">RAJKOT NAGARIK SAHAKARI BANK LTD</option>
                        <option value="RESERVE_BANK_OF_INDIA">RESERVE BANK OF INDIA</option>
                        <option value="SBERBANK">SBERBANK</option>
                        <option value="SHINHAN_BANK">SHINHAN BANK</option>
                        <option value="SHRI_CHHATRAPATI_RAJARSHI_SHAHU_URBAN_CO-OP_BANK_LTD">SHRI CHHATRAPATI RAJARSHI SHAHU URBAN CO-OP BANK LTD</option>
                        <option value="SOCIETE_GENERALE">SOCIETE GENERALE</option>
                        <option value="SOLAPUR_JANATA_SAHKARI_BANK_LTD.SOLAPUR">SOLAPUR JANATA SAHKARI BANK LTD.SOLAPUR</option>
                        <option value="SOUTH_INDIAN_BANK">SOUTH INDIAN BANK</option>
                        <option value="STANDARD_CHARTERED_BANK">STANDARD CHARTERED BANK</option>
                        <option value="STATE_BANK_OF_BIKANER_AND_JAIPUR">STATE BANK OF BIKANER AND JAIPUR</option>
                        <option value="STATE_BANK_OF_HYDERABAD">STATE BANK OF HYDERABAD</option>
                        <option value="STATE_BANK_OF_INDIA">STATE BANK OF INDIA</option>
                        <option value="STATE_BANK_OF_MAURITIUS_LTD">STATE BANK OF MAURITIUS LTD</option>
                        <option value="STATE_BANK_OF_MYSORE">STATE BANK OF MYSORE</option>
                        <option value="STATE_BANK_OF_PATIALA">STATE BANK OF PATIALA</option>
                        <option value="STATE_BANK_OF_TRAVANCORE">STATE BANK OF TRAVANCORE</option>
                        <option value="SUMITOMO_MITSUI_BANKING_CORPORATION">SUMITOMO MITSUI BANKING CORPORATION</option>
                        <option value="SYNDICATE_BANK">SYNDICATE BANK</option>
                        <option value="TAMILNAD_MERCANTILE_BANK_LTD">TAMILNAD MERCANTILE BANK LTD</option>
                        <option value="THANE_BHARAT_SAHAKARI_BANK_LTD">THANE BHARAT SAHAKARI BANK LTD</option>
                        <option value="THE_A.P._MAHESH_CO-OP_URBAN_BANK_LTD.">THE A.P. MAHESH CO-OP URBAN BANK LTD.</option>
                        <option value="THE_AHMEDABAD_MERCANTILE_CO-OPERATIVE_BANK_LTD.">THE AHMEDABAD MERCANTILE CO-OPERATIVE BANK LTD.</option>
                        <option value="THE_ANDHRA_PRADESH_STATE_COOP_BANK_LTD">THE ANDHRA PRADESH STATE COOP BANK LTD</option>
                        <option value="THE_BANK_OF_NOVA_SCOTIA">THE BANK OF NOVA SCOTIA</option>
                        <option value="THE_BANK_OF_RAJASTHAN_LTD">THE BANK OF RAJASTHAN LTD</option>
                        <option value="THE_BHARAT_CO-OPERATIVE_BANK_(MUMBAI)_LTD">THE BHARAT CO-OPERATIVE BANK (MUMBAI) LTD</option>
                        <option value="THE_COSMOS_CO-OPERATIVE_BANK_LTD.">THE COSMOS CO-OPERATIVE BANK LTD.</option>
                        <option value="THE_DELHI_STATE_COOPERATIVE_BANK_LTD.">THE DELHI STATE COOPERATIVE BANK LTD.</option>
                        <option value="THE_FEDERAL_BANK_LTD">THE FEDERAL BANK LTD</option>
                        <option value="THE_GADCHIROLI_DISTRICT_CENTRAL_COOPERATIVE_BANK_LTD">THE GADCHIROLI DISTRICT CENTRAL COOPERATIVE BANK LTD</option>
                        <option value="THE_GREATER_BOMBAY_CO-OP._BANK_LTD">THE GREATER BOMBAY CO-OP. BANK LTD</option>
                        <option value="THE_GUJARAT_STATE_CO-OPERATIVE_BANK_LTD">THE GUJARAT STATE CO-OPERATIVE BANK LTD</option>
                        <option value="THE_JALGAON_PEOPLES_CO-OP_BANK">THE JALGAON PEOPLES CO-OP BANK</option>
                        <option value="THE_JAMMU_AND_KASHMIR_BANK_LTD">THE JAMMU AND KASHMIR BANK LTD</option>
                        <option value="THE_KALUPUR_COMMERCIAL_CO._OP._BANK_LTD.">THE KALUPUR COMMERCIAL CO. OP. BANK LTD.</option>
                        <option value="THE_KALYAN_JANATA_SAHAKARI_BANK_LTD._">THE KALYAN JANATA SAHAKARI BANK LTD.</option>
                        <option value="THE_KANGRA_CENTRAL_CO-OPERATIVE_BANK_LTD">THE KANGRA CENTRAL CO-OPERATIVE BANK LTD</option>
                        <option value="THE_KANGRA_COOPERATIVE_BANK_LTD">THE KANGRA COOPERATIVE BANK LTD</option>
                        <option value="THE_KARAD_URBAN_CO-OP_BANK_LTD">THE KARAD URBAN CO-OP BANK LTD</option>
                        <option value="THE_KARNATAKA_STATE_APEX__COOP._BANK_LTD.">THE KARNATAKA STATE APEX  COOP. BANK LTD.</option>
                        <option value="THE_LAKSHMI_VILAS_BANK_LTD">THE LAKSHMI VILAS BANK LTD</option>
                        <option value="THE_MEHSANA_URBAN_COOPERATIVE_BANK_LTD">THE MEHSANA URBAN COOPERATIVE BANK LTD</option>
                        <option value="THE_MUNICIPAL_CO_OPERATIVE_BANK_LTD_MUMBAI">THE MUNICIPAL CO OPERATIVE BANK LTD MUMBAI</option>
                        <option value="THE_NAINITAL_BANK_LIMITED">THE NAINITAL BANK LIMITED</option>
                        <option value="THE_NASIK_MERCHANTS_CO-OP_BANK_LTD.,_NASHIK">THE NASIK MERCHANTS CO-OP BANK LTD., NASHIK</option>
                        <option value="THE_RAJASTHAN_STATE_COOPERATIVE_BANK_LTD.">THE RAJASTHAN STATE COOPERATIVE BANK LTD.</option>
                        <option value="THE_RATNAKAR_BANK_LTD">THE RATNAKAR BANK LTD</option>
                        <option value="THE_ROYAL_BANK_OF_SCOTLAND_N.V">THE ROYAL BANK OF SCOTLAND N.V</option>
                        <option value="THE_SAHEBRAO_DESHMUKH_CO-OP._BANK_LTD.">THE SAHEBRAO DESHMUKH CO-OP. BANK LTD.</option>
                        <option value="THE_SARASWAT_CO-OPERATIVE_BANK_LTD">THE SARASWAT CO-OPERATIVE BANK LTD</option>
                        <option value="THE_SEVA_VIKAS_CO-OPERATIVE_BANK_LTD_(SVB)">THE SEVA VIKAS CO-OPERATIVE BANK LTD (SVB)</option>
                        <option value="THE_SHAMRAO_VITHAL_CO-OPERATIVE_BANK_LTD">THE SHAMRAO VITHAL CO-OPERATIVE BANK LTD</option>
                        <option value="THE_SURAT_DISTRICT_CO_OPERATIVE_BANK_LTD.">THE SURAT DISTRICT CO OPERATIVE BANK LTD.</option>
                        <option value="THE_SURAT_PEOPLES_CO-OP_BANK_LTD">THE SURAT PEOPLES CO-OP BANK LTD</option>
                        <option value="THE_SUTEX_CO.OP._BANK_LTD.">THE SUTEX CO.OP. BANK LTD.</option>
                        <option value="THE_TAMILNADU_STATE_APEX_COOPERATIVE_BANK_LIMITED">THE TAMILNADU STATE APEX COOPERATIVE BANK LIMITED</option>
                        <option value="THE_THANE_DISTRICT_CENTRAL_CO-OP_BANK_LTD">THE THANE DISTRICT CENTRAL CO-OP BANK LTD</option>
                        <option value="THE_THANE_JANATA_SAHAKARI_BANK_LTD">THE THANE JANATA SAHAKARI BANK LTD</option>
                        <option value="THE_VARACHHA_CO-OP._BANK_LTD.">THE VARACHHA CO-OP. BANK LTD.</option>
                        <option value="THE_VISHWESHWAR_SAHAKARI_BANK_LTD.,PUNE_">THE VISHWESHWAR SAHAKARI BANK LTD.,PUNE</option>
                        <option value="THE_WEST_BENGAL_STATE_COOPERATIVE_BANK_LTD">THE WEST BENGAL STATE COOPERATIVE BANK LTD</option>
                        <option value="TJSB_SAHAKARI_BANK_LTD.">TJSB SAHAKARI BANK LTD.</option>
                        <option value="TUMKUR_GRAIN_MERCHANTS_COOPERATIVE_BANK_LTD.,">TUMKUR GRAIN MERCHANTS COOPERATIVE BANK LTD.,</option>
                        <option value="UBS_AG">UBS AG</option>
                        <option value="UCO_BANK">UCO BANK</option>
                        <option value="UNION_BANK_OF_INDIA">UNION BANK OF INDIA</option>
                        <option value="UNITED_BANK_OF_INDIA">UNITED BANK OF INDIA</option>
                        <option value="UNITED_OVERSEAS_BANK">UNITED OVERSEAS BANK</option>
                        <option value="VASAI_VIKAS_SAHAKARI_BANK_LTD.">VASAI VIKAS SAHAKARI BANK LTD.</option>
                        <option value="VIJAYA_BANK">VIJAYA BANK</option>
                        <option value="WEST_BENGAL_STATE_COOPERATIVE_BANK">WEST BENGAL STATE COOPERATIVE BANK</option>
                        <option value="WESTPAC_BANKING_CORPORATION">WESTPAC BANKING CORPORATION</option>
                        <option value="WOORI_BANK">WOORI BANK</option>
                        <option value="YES_BANK_LTD">YES BANK LTD</option>
                        <option value="ZILA_SAHKARI_BANK_LTD_GHAZIABAD">ZILA SAHKARI BANK LTD GHAZIABAD</option>
                        </select>
                        
                        </div>
                        
                           
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="disabledinput" class="control-label">@lang('Account No:')</label>
                            <input  type="text" class="form-control1" name="account_no" placeholder="Enter account no" value="{{$seller->account_holder_name}}">
                        
                        </div> 
                       
                       
                    </div>
                    <div class="form-group">
                       <div class="col-sm-4">
                            <label for="disabledinput" class="control-label">@lang('IFSC Code:')</label>
                            <input  type="text" class="form-control1 " name="ifsc_code" name="ifsc_code" placeholder="e.g 4345-5443-2232" value="{{$seller->ifsc_code}}">
                        </div> 
                    </div>
                     <div class="form-group">
                       <div class="col-sm-4">
                            <label for="disabledinput" class="control-label">@lang('Upload Cancle Cheque:')</label>
                            <input  type="file" class="form-control1" id="chq" name="chq" value="{{$seller->chqeue}}">
                        </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success pull-right" style="margin-left:38px">Update</button>
                        <input type="hidden" name="id" value="{{$seller->id}}">
                        <input type="hidden" name="act" value="bank">
                      </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
