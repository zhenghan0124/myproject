<?php
/*
 * 畅联SWITCH接口
 * by zhoulei 2016-1-20
 */
namespace Org\Util;


ini_set('soap.wsdl_cache_enabled', 0); // disabling WSDL cache
ini_set('soap.wsdl_cache_ttl', 86400);
ini_set('default_socket_timeout', 30);
libxml_disable_entity_loader(false);

class Chinaonline
{
    protected $dev_abUrl = 'https://Col-test.shijicloud.com/Col_switch_ws/Availability.asmx';// 开发环境 查询接口
    protected $dev_reservUrl = 'https://Col-test.shijicloud.com/Col_switch_ws/Reservation.asmx';// 开发环境预订接口
    protected $abUrl = 'https://switch.shijicloud.com/Col_switch_ws/Availability.asmx';// 生产环境 查询接口
    protected $reservUrl = 'https://switch1.shijicloud.com/Col_switch_ws/Reservation.asmx';// 生产环境 预订接口
    protected $client;
    protected $key;
    protected $soapHead;
    protected $channelcode = 'CMT'; //渠道码
    protected $chainCode = 'CCM';   //集团编码
    protected $hotelCode;
    protected $connection_timeout = 30; //超时时间
    public $qualifyingidtype = 'TRAVEL_AGENT'; //订单来源类型

    public function __construct($params = array())
    {
        //开发模式
        if ($params['dev']) {
            $this->abUrl = $this->dev_abUrl;
            $this->reservUrl = $this->dev_reservUrl;
        }
        if ($params['channelcode']) {
            $this->channelcode = $params['channelcode'];
        }
        if ($params['chainCode']) {
            $this->chainCode = $params['chainCode'];
        }
        if ($params['hotelCode']) {
            $this->hotelCode = $params['hotelCode'];
        }
        if ($params['qualifyingidtype']) {
            $this->qualifyingidtype = $params['qualifyingidtype'];
        }
        //load()->func('logging');

        $url = $params['type'] == 'order' ? $this->reservUrl : $this->abUrl;//默认初始化查询接口
        if (strpos($url, 'https') !== false) {
            $opts = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ],
                'ssl_method ' => SOAP_SSL_METHOD_TLS
            ];
            $params = [
                'location' => $url,
                'encoding' => 'UTF-8',
                'verifypeer' => false,
                'verifyhost' => false,
                'soap_version' => SOAP_1_2,
                'trace' => 1,
                'exceptions' => 1,
                'connection_timeout' => $this->connection_timeout,
                'stream_context' => stream_context_create($opts)
            ];
            $this->client = new \SoapClient($url . '?wsdl', $params);
        } else {
            $this->client = new \SoapClient($url . '?wsdl', [
                'trace' => 1,
                'connection_timeout' => $this->connection_timeout,
                'soap_version' => SOAP_1_1
            ]);
        }
//		print_r( $this->client->__getFunctions());die;
        if (!$this->client) {
            die('soap接口初始化失败');
        }
        $this->client->soap_defencoding = 'UTF-8';
        $this->client->xml_encoding = 'UTF-8';
        $strHeader = '<OGHeader xmlns="http://webservices.micros.com/og/4.3/Core/"><Origin entityID="' . $this->channelcode . '" systemType="WEB"/><Destination entityID="ORS" systemType="ORS"/></OGHeader>';
        $headerVar = new \SoapVar($strHeader, XSD_ANYXML, null, null, null);
        $this->soapHead = new \SoapHeader('http://webservices.micros.com/og/4.3/Core/', 'OGHeader', $headerVar);
    }

    /**
     * 查询所有房型数据
     */
    public function allRoom($params)
    {
        if (empty($params)) {
            return false;
        }
        $startDate = $params['startDate'] ?: date('Y-m-d');
        $endDate = $params['endDate'] ?: date('Y-m-d', strtotime('+1 day'));
        //$ratePlanCode = $params['ratePlanCode'];
        $xml = new XMLWriter();
        $xml->openMemory();
        $xml->startElementNS('ns', 'AvailabilityRequest', 'http://webservices.micros.com/ows/5.1/Availability.wsdl');
        $xml->writeAttribute('summaryOnly', 'true');
        $xml->startElementNS('a', 'AvailRequestSegment', 'http://webservices.micros.com/og/4.3/Availability/');
        $xml->writeAttribute('availReqType', 'Room');
        $xml->writeAttribute('numberOfRooms', 1);
        $xml->writeAttribute('roomOccupancy', 1);
        $xml->writeAttribute('totalNumberOfGuests', 1);
        $xml->startElementNS('a', 'RatePlanCandidates', null);
        $xml->startElementNS('a', 'RatePlanCandidate', null);
        $xml->writeAttribute('ratePlanCode', 'ALL');
        $xml->writeAttribute('qualifyingIdType', $this->qualifyingidtype);
        $xml->writeAttribute('qualifyingIdValue', $this->channelcode);
        $xml->endElement();
        $xml->endElement();
        $xml->startElementNS('a', 'StayDateRange', null);
        $xml->startElementNS('hc', 'StartDate', 'http://webservices.micros.com/og/4.3/HotelCommon/');
        $xml->Text($startDate);
        $xml->endElement();
        $xml->startElementNS('hc', 'EndDate', 'http://webservices.micros.com/og/4.3/HotelCommon/');
        $xml->Text($endDate);
        $xml->endElement();
        $xml->endElement();
        $xml->startElementNS('a', 'HotelSearchCriteria', null);
        $xml->startElementNS('a', 'Criterion', null);
        $xml->startElementNS('a', 'HotelRef', null);
        $xml->writeAttribute('chainCode', $this->chainCode);
        $xml->writeAttribute('hotelCode', $this->hotelCode);
        $xml->endElement();
        $xml->endElement();
        $xml->endElement();
        $xml->endElement();
        $xml->endElement();

        $request = new \SoapVar($xml->outputMemory(), XSD_ANYXML);
        try {
            $response = $this->client->__soapCall("Availability", array($request), null, $this->soapHead);
        } catch (SOAPFault $e) {

            $result = false;
        }
        $response = $this->simplest_xml_to_array($response);
        if ($response['Result']['resultStatusFlag'] == 'SUCCESS') {
            $result = $response['AvailResponseSegments']['AvailResponseSegment']['RoomStayList']['RoomStay'];
            $rooms = array();
            foreach ($result['RoomTypes']['RoomType'] AS $roomType) {
                $rooms[] = array('roomTypeCode' => $roomType['roomTypeCode'], 'maxnum' => $roomType['numberOfUnits'], 'roomType' => $roomType['RoomTypeDescription']['Text']['_']);
            }
            foreach ($result['RoomRates']['RoomRate'] AS $roomRate) {
                //if ( $roomRate['ratePlanCode'] == $ratePlanCode ) {
                //匹配房价码
                foreach ($rooms AS &$room) {
                    if ($room['roomTypeCode'] == $roomRate['roomTypeCode']) {
                        $room['rateplans'][] = ['ratecode' => $roomRate['ratePlanCode'], 'price' => $roomRate['Rates']['Rate']['Base']['_'], 'total_price' => $roomRate['Total']['_']];
                    }
                }
                //}
            }
            foreach ($result['RatePlans']['RatePlan'] as $rateplan) {
                $rateplans[] = ['ratePlanCode' => $rateplan['ratePlanCode'],'RatePlanDescription'=>$rateplan['RatePlanDescription']['Text']['_']];
            }

            $result = ['rooms' => $rooms, 'rateplans' => $rateplans];
        } else {
            //logging_run('Availability ' . var_export($response, true), 'error', 'chinaonline');
            $result = array('status' => 0, 'msg' => $response['Result']['Text']['TextElement']['_']);
        }

        return $result;
    }

    /**
     * 房价查询
     */
    public function roomInfo($params)
    {
        if (empty($params) || $params['roomTypeCode'] == '' || $params['ratePlanCode'] == '') {
            return false;
        }
        $startDate = $params['startDate'];
        $endDate = $params['endDate'];
        $numberOfRooms = $params['numberOfRooms'] ?: 1;
        $ratePlanCode = $params['ratePlanCode'];
        $roomTypeCode = $params['roomTypeCode'];
        $days = $params['days'];

        $xml = <<<XML
<AvailabilityRequest xmlns:a="http://webservices.micros.com/og/4.3/Availability/" xmlns:hc="http://webservices.micros.com/og/4.3/HotelCommon/" summaryOnly="false" xmlns="http://webservices.micros.com/ows/5.1/Availability.wsdl">
			<a:AvailRequestSegment availReqType="Room" numberOfRooms="{$numberOfRooms}" roomOccupancy="1" totalNumberOfGuests="1">
				<a:StayDateRange>
					<hc:StartDate>{$startDate}</hc:StartDate>
					<hc:EndDate>{$endDate}</hc:EndDate>
				</a:StayDateRange>
				<a:RatePlanCandidates>
					<a:RatePlanCandidate ratePlanCode="{$ratePlanCode}" qualifyingIdType="TRAVEL" qualifyingIdValue="{$this->channelcode}"/>
				</a:RatePlanCandidates>				
				<a:RoomStayCandidates>
					<a:RoomStayCandidate roomTypeCode="{$roomTypeCode}" invBlockCode-optional="{$this->channelcode}"/>
				</a:RoomStayCandidates>
				<a:HotelSearchCriteria>
					<a:Criterion>
						<a:HotelRef chainCode="{$this->chainCode}" hotelCode="{$this->hotelCode}"/>
					</a:Criterion>
				</a:HotelSearchCriteria>
			</a:AvailRequestSegment>
		</AvailabilityRequest>
XML;
        $request = new \SoapVar($xml, XSD_ANYXML);
        try {
            $response = $this->client->__soapCall("Availability", array($request), null, $this->soapHead);
        } catch (SOAPFault $e) {
            $result = false;
        }
        $response = $this->simplest_xml_to_array($response);

        if ($response['Result']['resultStatusFlag'] == 'SUCCESS') {

            $result = $response['AvailResponseSegments']['AvailResponseSegment']['RoomStayList']['RoomStay']['ExpectedCharges'];
            // var_dump($result);
            $rooms = array();
            if ($days == 1) {
                $rooms[] = array(
                    'date' => $result['ChargesForPostingDate']['PostingDate'],
                    'price' => $result['ChargesForPostingDate']['RoomRateAndPackages']['TotalCharges']
                );
            } else {
                foreach ($result['ChargesForPostingDate'] AS $room) {
                    $rooms[] = array('date' => $room['PostingDate'],
                        'price' => $room['RoomRateAndPackages']['TotalCharges']
                    );
                }
            }
            $result = array('status' => 1, 'data' => $rooms, 'total' => $result['TotalRoomRateAndPackages']);
            // var_dump($result);
        } else {
            //logging_run("params:" . json_encode($params, JSON_UNESCAPED_UNICODE) . " resp:" . json_encode($response, JSON_UNESCAPED_UNICODE), 'error', 'chinaonline');
            $result = array('status' => 0, 'msg' => $response['Result']['Text']['TextElement']['_']);
        }

        //返回房价部分数据
        return $result;
    }

    /**
     * 预订
     * 暂时限制一次预订一个房间，多房间需要提交多个客人信息（Profile）
     */
    public function order($params)
    {
        if (empty($params) || empty($params['dayprices'])) {
            return false;
        }

        $ordersn = $params['ordersn'];
        $startDate = $params['startDate'];
        $endDate = $params['endDate'];
        $numberOfUnits = $params['numberOfUnits'] ?: 1;//客房数
        $ratePlanCode = $params['ratePlanCode'];
        $roomTypeCode = $params['roomTypeCode'];
        $comment = $params['comment'];//备注信息

        if (preg_match("/[\x7f-\xff]/", $params['name'])) {
            $firstName = $params['name'];
            $name = $this->xingshi($params['name']);//拆分姓名
                     
            \Org\Util\Pinyin::set('accent', false);//不要声调

            $lastName = \Org\Util\Pinyin::trans($name[0]) . ' ' . \Org\Util\Pinyin::trans($name[1]);
        } else {
            //英文名
            $firstName = $params['name'];
            $lastName = $params['name'];
        }

        $mobile = $params['mobile'];
        $Total = $params['Total'];//总价
        $gender = $params['sex'] == 1 ? 'gender="MALE"' : ($params['sex'] == 2 ? 'gender="FEMALE"' : '');
        $nameTitle = $params['sex'] == 1 ? 'MR' : ($params['sex'] == 2 ? 'MS' : '');
        $Rates = '';
        //每日房价
        foreach ($params['dayprices'] AS $dayprice) {
            $Rates .= '<hc:Rate effectiveDate="' . $dayprice['date'] . '">
                        <hc:Base>' . $dayprice['price'] . '</hc:Base>
                    </hc:Rate>';
        }
        $guaranteeType = $params['guaranteeType'] ? $params['guaranteeType'] : 'PAID'; //担保类型包括 CCGTD 信用卡   6PM 6点到店   TAGTD 渠道担保
        $xml = <<<XML
<CreateBookingRequest xmlns="http://webservices.micros.com/ows/5.1/Reservation.wsdl" xmlns:c="http://webservices.micros.com/og/4.3/Common/" xmlns:r="http://webservices.micros.com/og/4.3/Reservation/" xmlns:hc="http://webservices.micros.com/og/4.3/HotelCommon/" xmlns:n="http://webservices.micros.com/og/4.3/Name/">
			<HotelReservation>
				<r:UniqueIDList>
					<c:UniqueID type="EXTERNAL">{$ordersn}</c:UniqueID>
				</r:UniqueIDList>
				<r:RoomStays>
					<hc:RoomStay>
						<hc:RatePlans>
							<hc:RatePlan ratePlanCode="{$ratePlanCode}" qualifyingIdType="{$this->qualifyingidtype}" qualifyingIdValue="{$this->channelcode}"/>
						</hc:RatePlans>
						<hc:RoomTypes>
							<hc:RoomType roomTypeCode="{$roomTypeCode}" numberOfUnits="{$numberOfUnits}"/>
						</hc:RoomTypes>
						<hc:RoomRates>
							<hc:RoomRate roomTypeCode="{$roomTypeCode}" ratePlanCode="{$ratePlanCode}">
								<hc:Rates>
                                    {$Rates}
								</hc:Rates>
								<hc:Total/>
								<hc:Total>{$Total}</hc:Total>
							</hc:RoomRate>
						</hc:RoomRates>
						<hc:GuestCounts>
							<hc:GuestCount ageQualifyingCode="ADULT" count="1"/>
							<hc:GuestCount ageQualifyingCode="CHILD" count="0"/>
						</hc:GuestCounts>
						<hc:TimeSpan>
							<hc:StartDate>{$startDate}</hc:StartDate>
							<hc:EndDate>{$endDate}</hc:EndDate>
						</hc:TimeSpan>
						<hc:Guarantee guaranteeType="{$guaranteeType}"/>
						<hc:HotelReference chainCode="{$this->chainCode}" hotelCode="{$this->hotelCode}"/>
						<hc:Comments>
							<hc:Comment guestViewable="false" commentOriginatorCode="CRO">
								<hc:Text>{$comment}</hc:Text>
							</hc:Comment>
						</hc:Comments>
					</hc:RoomStay>
				</r:RoomStays>
				<r:ResGuests>
					<r:ResGuest resGuestRPH="0">
						<r:Profiles>
							<n:Profile>
								<n:Customer {$gender}>
									<n:PersonName>
										<c:nameTitle>{$nameTitle}</c:nameTitle>
										<c:firstName>{$firstName}</c:firstName>
										<c:lastName>{$lastName}</c:lastName>
									</n:PersonName>
								</n:Customer>
								<n:Addresses>
									<n:NameAddress addressType="">
										<c:AddressLine/>
										<c:cityName/>
										<c:stateProv/>
										<c:countryCode>CN</c:countryCode>
										<c:postalCode/>
									</n:NameAddress>
								</n:Addresses>
								<n:Phones>
                                    <n:NamePhone phoneRole="PHONE" phoneType="MOBILE">
                                        <c:PhoneNumber>{$mobile}</c:PhoneNumber>
                                    </n:NamePhone>                                    
                                </n:Phones>
							</n:Profile>
						</r:Profiles>
					</r:ResGuest>
				</r:ResGuests>
			</HotelReservation>
			<CheckInPolicy xmlns="http://webservices.chinaonline.net.cn/switch/1.5.1/Reservation.wsdl">
				<EarliestTime>19:00</EarliestTime>
				<LatestTime>20:00</LatestTime>
			</CheckInPolicy>
			<ChannelUniqueResID xmlns="http://webservices.chinaonline.net.cn/switch/1.5.1/Reservation.wsdl"/>
		</CreateBookingRequest>
XML;
        $request = new \SoapVar($xml, XSD_ANYXML);
        //var_dump($xml);
        try {
            $response = $this->client->__soapCall("CreateBooking", array($request), null, $this->soapHead);
        } catch (SOAPFault $e) {
            $result = false;
        }
        $response = $this->simplest_xml_to_array($response);
        if ($response['Result']['resultStatusFlag'] == 'SUCCESS') {
            $result = array(
                'status' => 1,
                'orderid' => $response['HotelReservation']['UniqueIDList']['UniqueID']['_']
            );
        } else {
            //logging_run("order request:" . var_export($request, true) . " resp:" . var_export($response, true), 'error', 'chinaonline');
            $result = array('status' => 0, 'msg' => $response['Result']['Text']['TextElement']['_']);
        }

        return $result;
    }

    /**
     * 取消订单
     */
    public function cancelOrder($params)
    {
        if (empty($params)) {
            return false;
        }
        $ConfirmationNumber = $params['ConfirmationNumber'];
        $CancelReason = $params['CancelReason'] ?: '客人取消';
        $xml = <<<XML
<CancelBookingRequest xmlns:hc="http://webservices.micros.com/og/4.3/HotelCommon/" xmlns:c="http://webservices.micros.com/og/4.3/Common/" xmlns="http://webservices.micros.com/ows/5.1/Reservation.wsdl">
			<HotelReference chainCode="{$this->chainCode}" hotelCode="{$this->hotelCode}"/>
			<ConfirmationNumber type="INTERNAL">{$ConfirmationNumber}</ConfirmationNumber>
			<CancelTerm cancelType="Cancel" cancelReasonCode="">
				<hc:CancelReason>
					<hc:Text>{$CancelReason}</hc:Text>
				</hc:CancelReason>
			</CancelTerm>
		</CancelBookingRequest>
XML;
        $request = new \SoapVar($xml, XSD_ANYXML);
        try {
            $response = $this->client->__soapCall("CancelBooking", array($request), null, $this->soapHead);
        } catch (SOAPFault $e) {
            //logging_run('cancelOrder ' . $this->client->__getLastRequest(), 'error', 'chinaonline');
            //logging_run('cancelOrder ' . $this->client->__getLastResponse(), 'error', 'chinaonline');
            $result = false;
        }
        $response = $this->simplest_xml_to_array($response);
        if ($response['Result']['resultStatusFlag'] == 'SUCCESS') {
            $result = array('status' => 1);
        } else {
            ///logging_run("cancelOrder request:" . var_export($request, true) . " resp:" . var_export($response, true), 'error', 'chinaonline');
            $result = array('status' => 0, 'msg' => $response['Result']['Text']['TextElement']['_']);
        }

        return $result;
    }

    //查询订单状态
    public function orderInfo($params)
    {
        if (empty($params)) {
            return false;
        }
        $xml = <<<XML

XML;
        $request = new \SoapVar($xml, XSD_ANYXML);
        try {
            $response = $this->client->__soapCall("FetchBookingStatus", array($request), null, $this->soapHead);
        } catch (SOAPFault $e) {
            //logging_run('cancelOrder ' . $this->client->__getLastRequest(), 'error', 'chinaonline');
           /// logging_run('cancelOrder ' . $this->client->__getLastResponse(), 'error', 'chinaonline');
            $result = false;
        }
    }

    /**
     * object 转数组
     *
     * @param object
     *
     * @return array XML数组
     */
    private function simplest_xml_to_array($obj)
    {
        $data = json_decode(json_encode($obj), true);

        return $data;
    }


    private function xingshi($fullname)    {
        if (!preg_match("/[\x7f-\xff]/", $fullname)) {
            //英文名
            $pos = strpos($fullname, ' ');
            $firstname = substr($fullname, 0, $pos);
            $lastname = substr($fullname, $pos + 1);
            //西软系统 顺序特殊
            return array($firstname,$lastname );
        }
        $complex = array(
            '欧阳',
            '太史',
            '端木',
            '上官',
            '司马',
            '东方',
            '独孤',
            '南宫',
            '万俟',
            '闻人',
            '夏侯',
            '诸葛',
            '尉迟',
            '公羊',
            '赫连',
            '澹台',
            '皇甫',
            '宗政',
            '濮阳',
            '公冶',
            '太叔',
            '申屠',
            '公孙',
            '慕容',
            '仲孙',
            '钟离',
            '长孙',
            '宇文',
            '城池',
            '司徒',
            '鲜于',
            '司空',
            '汝嫣',
            '闾丘',
            '子车',
            '亓官',
            '司寇',
            '巫马',
            '公西',
            '颛孙',
            '壤驷',
            '公良',
            '漆雕',
            '乐正',
            '宰父',
            '谷梁',
            '拓跋',
            '夹谷',
            '轩辕',
            '令狐',
            '段干',
            '百里',
            '呼延',
            '东郭',
            '南门',
            '羊舌',
            '微生',
            '公户',
            '公玉',
            '公仪',
            '梁丘',
            '公仲',
            '公上',
            '公门',
            '公山',
            '公坚',
            '左丘',
            '公伯',
            '西门',
            '公祖',
            '第五',
            '公乘',
            '贯丘',
            '公皙',
            '南荣',
            '东里',
            '东宫',
            '仲长',
            '子书',
            '子桑',
            '即墨',
            '达奚',
            '褚师'
        );
        $vLength = mb_strlen($fullname, 'utf8');
        $lastname = '';
        $firstname = '';
        if ($vLength > 2) {
            $preTwoWords = mb_substr($fullname, 0, 2, 'utf8');

            if (in_array($preTwoWords, $complex)) {
                $lastname = $preTwoWords;
                $firstname = mb_substr($fullname, 2, 10, 'utf8');
            } else {
                $lastname = mb_substr($fullname, 0, 1, 'utf8');
                $firstname = mb_substr($fullname, 1, 10, 'utf8');
            }
        } else if ($vLength == 2) {
            $lastname = mb_substr($fullname, 0, 1, 'utf8');
            $firstname = mb_substr($fullname, 1, 10, 'utf8');
        } else {
            $lastname = $fullname;
        }

        return array($lastname, $firstname);
    }
}

?>